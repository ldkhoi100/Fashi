<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Products;
use App\Customers;
use App\Bills;
use App\Bill_detail;
use App\Size;
use Mail;
use App\Mail\ShoppingMail;
use App\Coupons;
use App\MessageCenter;
use App\Size_products;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = null;
        $size_product = null;
        if (Auth::user()) {
            foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
                $check = $product[] = Products::find($cart->id);
                $size_product[] = Size_products::where('id_size', $cart->options->size)->where('id_products', $check->id)->first();
            }
        }
        //Request coupon code in function coupon
        if ($request->session()->has('coupon')) {
            $coupon = Session('coupon');
        } else {
            $coupon = null;
        }
        return view('fashi.shoppingcart', compact("product", "coupon", "size_product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'payment' => "required",
            "size.*" => "required | string | min:0"
        ]);

        if (empty(Auth::user()->phone) && empty(Auth::user()->address)) {
            return redirect()->route('details')->with('toast_error', 'Please update your phone and your address !');
        }

        $bool = true;
        foreach (Cart::instance(Auth::user()->id)->content() as $key => $item) {
            $size_check = Size_products::where('id_size', $item->options->size)->where('id_products', $item->id)->first();
            if ($item->qty > $size_check->quantity) {
                Cart::instance(Auth::user()->id)->update($item->rowId, $size_check->quantity);
                $bool = false;
            }
        }
        if ($bool == false) {
            return back()->with('toast_error', 'The number of products you have entered exceeds the allowed level !');
        }

        $oderdetail = array();
        if (Auth::user()) {
            $check_customer = Customers::where('username', Auth::user()->username)->first();
            // Check if user current have made a previous purchase
            if ($check_customer == true) {
                $customer = Customers::findOrFail($check_customer->id);
                $customer->name = Auth::user()->name;
                $customer->email = Auth::user()->email;
                $customer->address = Auth::user()->address;
                $customer->phone = Auth::user()->phone;
                $customer->save();
            } else {
                $customer = new Customers();
                $customer->username = Auth::user()->username;
                $customer->name = Auth::user()->name;
                $customer->email = Auth::user()->email;
                $customer->address = Auth::user()->address;
                $customer->phone = Auth::user()->phone;
                $customer->save();
            }

            $data = $request->all();
            $data["id_customer"] = $customer->id;
            $data["date_order"] = date('Y-m-d H:i:s');
            $data["total"] = Cart::instance(Auth::user()->id)->total();
            $data["payment"] = $request->payment;
            $bills = Bills::create($data);
            $id_order = $bills->id;
            $bill_detail = [];

            $message = new MessageCenter();
            $message->id_bill = $id_order;
            $message->save();

            foreach (Cart::instance(Auth::user()->id)->content() as $key => $cart) {
                $bill_detail["id_bill"] = $id_order;
                $bill_detail["id_product"] = $cart->id;
                $bill_detail["name_products"] = $cart->name;
                $bill_detail["size"] = $cart->options->namesize;
                $bill_detail["quantity"] = $cart->qty;
                $bill_detail["unit_price"] = $cart->price;

                if (!empty(request('code'))) {
                    $bill_detail["discount"] = number_format(100 - ($cart->total * 100 / ($cart->price * $cart->qty)), 0);
                }

                $bill_detail["total_price"] = $cart->total;
                $oderdetail[$key] = Bill_detail::create($bill_detail);

                $size_product = Size_products::where('id_size', $cart->options->size)->where('id_products', $cart->id)->first();
                $size_product->quantity -= $cart->qty;
                $size_product->save();
            }

            if (!empty(request('code'))) {
                $coupon = Coupons::where('id_coupon', request('code'))->first();
                if ($coupon == true) {
                    $coupon->used = 1;
                    $coupon->user_used = Auth::user()->username;
                    $coupon->save();
                }
            }

            Mail::to($customer->email)->send(new ShoppingMail($bills, $oderdetail));

            Cart::instance(Auth::user()->id)->destroy();
            return redirect()->route('home')->with('toast', 'You have successfully placed an order! We will send a mail to confirm your order today');
        } else {
            return redirect()->route('login');
        }
    }

    public function formCheckout(Request $request)
    {
        $this->validate($request, [
            'payment' => "required",
            "size.*" => "required | numeric | between:1,4",
            'name' => 'required | string | min:5 | max: 255',
            'email' => 'required | email | min:5 | max: 255',
            'city' => 'required | string | min:5 | max: 255',
            'country' => 'required | string | min:5 | max: 255',
            'postcode' => 'required | numeric | min:0',
            'address' => 'required | string | min:5 | max: 255',
            'phone' => 'required | numeric | min:0',
        ]);
        $oderdetail = array();
        if (request('qty') > request('check_availability')) {
            return redirect()->back()->with('error', 'The quantity of products you entered is incorrect');
        } else {
            if (!(Auth::user())) {
                $customer = new Customers();
                $customer->name = request('name');
                $customer->email = request('email');
                $customer->city = request('city');
                $customer->country = request('country');
                $customer->postcode = request('postcode');
                $customer->address = request('address');
                $customer->phone = request('phone');
                $customer->save();

                $data = $request->all();
                $data["id_customer"] = $customer->id;
                $data["date_order"] = date('Y-m-d H:i:s');
                $data["total"] = Cart::instance(Auth::user()->id)->total();
                $data["payment"] = $request->payment;
                $bills = Bills::create($data);

                $id_order = $bills->id;
                $bill_detail = [];

                $message = new MessageCenter();
                $message->id_bill = $id_order;
                $message->save();

                $i = 0;
                foreach (Cart::instance(Auth::user()->id)->content() as $key => $cart) {
                    $bill_detail["id_bill"] = $id_order;
                    $bill_detail["id_product"] = $cart->id;
                    $bill_detail["name_products"] = $cart->name;
                    $bill_detail["size"] = request("size" . $i++);
                    $bill_detail["quantity"] = $cart->qty;
                    $bill_detail["unit_price"] = $cart->price;

                    if (!empty(request('code'))) {
                        $bill_detail["discount"] = number_format(100 - ($cart->total * 100 / ($cart->price * $cart->qty)), 0);
                    }

                    $bill_detail["total_price"] = $cart->total;
                    $oderdetail[$key] = Bill_detail::create($bill_detail);

                    $product = Products::findOrFail($cart->id);
                    $product->amount -= $cart->qty;
                    $product->save();
                }

                if (!empty(request('code'))) {
                    $coupon = Coupons::where('id_coupon', request('code'))->first();
                    $coupon->used = 1;
                    $coupon->user_used = $customer->name;
                    $coupon->save();
                }

                Mail::to($customer->email)->send(new ShoppingMail($bills, $oderdetail));
                Cart::instance(Auth::user()->id)->destroy();
                return redirect()->route('home')->with('toast', 'You have successfully placed an order! We will send a mail to confirm your order today');
            } else { }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $amount = Cart::instance(Auth::user()->id)->get($id)->id;
        if ($request->ajax()) {
            if (request('qty') <= 0) {
                return response()->json(['error' => 'Minimum quantity is 1']);
            }
            $product = Products::find($amount);
            if (request('qty') > $product->amount) {
                return response()->json(['error' => "Quantity of <b>$product->name</b> is less than $product->amount"]);
            }
            Cart::instance(Auth::user()->id)->update($id, request('qty'));
            return response()->json(['result' => 'Update quantity success']);
        }
    }

    public function saveListItemCart(Request $request, $id, $quantity)
    {
        $id_cart = Cart::instance(Auth::user()->id)->get($id);
        $id_product = Products::findOrFail($id_cart->id);
        $size_product = Size_products::where('id_size', $id_cart->options->size)->where('id_products', $id_product->id)->first();
        $total = 0;
        $bool = true;
        foreach (Cart::instance(Auth::user()->id)->content() as $item) {
            if ($item->options->size == $size_product->id_size) {
                $total += $item->qty;
            }
        }
        if ($quantity > $id_cart->qty) {
            $total += ($quantity - $id_cart->qty);
        } else {
            $total += ($quantity - $id_cart->qty);
        }

        if ($total > $size_product->quantity) {
            $bool = false;
        }

        if ($request->ajax()) {
            if (($quantity > $size_product->quantity) || $bool == false) {
                return response()->json([
                    'status' => 'Wrong',
                    'msg' => 'Error'
                ]);
            }
        }

        Cart::instance(Auth::user()->id)->update($id, $quantity);
        $product = null;
        $size_product = null;
        foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
            $check = $product[] = Products::find($cart->id);
            $size_product[] = Size_products::where('id_size', $cart->options->size)->where('id_products', $check->id)->first();
        }
        //Request coupon code in function coupon()
        if ($request->session()->has('coupon')) {
            $coupon = Session('coupon');
        } else {
            $coupon = null;
        }
        return view('ajax.list-cart', compact('coupon', 'product', 'size_product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance(Auth::user()->id)->destroy();
        return redirect()->route('home')->with('You have canceled the entire product in the cart !');
    }

    //Add shopping cart
    public function addCart($id, Request $request)
    {
        if (Auth::user()) {
            $qty = null;
            $product = Products::findOrFail($id);
            $bool = true;
            $total = 0;
            foreach (Cart::instance(Auth::user()->id)->content() as $item) {
                if ($item->id == $product->id) {
                    $total += $item->qty;
                    if (($total) >= $product->amount) {
                        $bool = false;
                    }
                }
            }

            if ($request->ajax()) {
                if ($bool == false) {
                    return response()->json([
                        'status' => 'error',
                        'msg' => 'Error'
                    ]);
                }
            }

            if (request('qty') > request('check_stock')) {
                return redirect()->back()->with('toast_error', "You enter an amount that exceeds the allowed limit!");
            }
            if (request('quantity') > request('check_quantity')) {
                return redirect()->back()->with('toast_error', "This item is sold out, we will import this product soon!");
            }
            if (request('qty')) {
                $qty = request('qty');
            } else {
                $qty = 1;
            }
            if (request('size')) {
                $size = request('size');
            } else {
                $size = 1;
            }
            if ($product->promotion_price > 0) {
                $price = $product->promotion_price;
            } else {
                $price = $product->unit_price;
            }
            Cart::instance(Auth::user()->id)->add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $qty,
                'price' => $price,
                'weight' => 0,
                'taxRate' => 0,
                'options' => [
                    'img' => $product->image1,
                    'size' => $request->input('size')
                ]
            ]);
            return view('ajax.cart');
        } else {
            return redirect()->route('login')->with('error', 'You mush login to add to cart');
        }
    }

    public function addCartPost($id, $qty, $check, $size, Request $request)
    {
        if ($request->ajax()) {
            if ($size == 'abc') {
                return response()->json([
                    'status' => 'errorsize',
                    'msg' => 'Error'
                ]);
            }
        }
        $product = Products::findOrFail($id);
        $bool = true;
        $total = $qty;
        $qty_size_check = Size_products::where('id_size', $size)->where('id_products', $id)->first();

        foreach (Cart::instance(Auth::user()->id)->content() as $item) {
            if ($item->options->size == $qty_size_check->id_size) {
                $total += $item->qty;
                if ($total > $qty_size_check->quantity) {
                    $bool = false;
                }
            }
        }
        if ($request->ajax()) {
            if ($qty > $qty_size_check->quantity || $bool == false || $qty < 1) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Error'
                ]);
            }
        }
        if ($product->promotion_price > 0) {
            $price = $product->promotion_price;
        } else {
            $price = $product->unit_price;
        }
        Cart::instance(Auth::user()->id)->add([
            'id' => $id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $price,
            'weight' => 0,
            'taxRate' => 0,
            'options' => [
                'img' => $product->image1,
                'size' => $size,
                'namesize' => $qty_size_check->size->name,
            ]
        ]);
        return view('ajax.cart');
    }

    public function deleteCart($id)
    {
        Cart::instance(Auth::user()->id)->remove($id);
        return view('ajax.cart');
    }

    public function updateDeleteListCart()
    {
        return view('ajax.cart');
    }

    public function deleteListCart($id, Request $request)
    {
        Cart::instance(Auth::user()->id)->remove($id);
        $product = null;
        $size_product = null;

        foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
            $check = $product[] = Products::find($cart->id);
            $size_product[] = Size_products::where('id_size', $cart->options->size)->where('id_products', $check->id)->first();
        }
        //Request coupon code in function coupon()
        if ($request->session()->has('coupon')) {
            $coupon = Session('coupon');
        } else {
            $coupon = null;
        }
        return view('ajax.list-cart', compact('coupon', 'product', 'size_product'));
    }

    public function updatedeleteCart(Request $request)
    {
        // Cart::instance(Auth::user()->id)->remove($id);

        $product = null;
        $size_product = null;
        foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
            $check = $product[] = Products::find($cart->id);
            $size_product[] = Size_products::where('id_size', $cart->options->size)->where('id_products', $check->id)->first();
        }
        //Request coupon code in function coupon()
        if ($request->session()->has('coupon')) {
            $coupon = Session('coupon');
        } else {
            $coupon = null;
        }
        return view('ajax.list-cart', compact('coupon', 'product', 'size_product'));
    }

    //Coupons
    public function coupons($code, Request $request)
    {
        $coupon = Coupons::where('id_coupon', $code)->where('used', 0)->first();
        $check_used_coupon = Coupons::where('id_coupon', $code)->where('used', 1)->first();

        if ($request->ajax()) {
            if ($check_used_coupon == true) {
                return response()->json([
                    'used' => 'error',
                    'msg2' => 'This coupon code has been used'
                ]);
            }
            if ($coupon == false) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'The discount code you entered is incorrect'
                ]);
            }
        }
        Cart::instance(Auth::user()->id)->setGlobalDiscount($coupon->discount);
        $request->session()->put('coupon', request('code'));
        $product = null;
        foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
            $product[] = Products::find($cart->id);
        }
        //Request coupon code in function coupon()
        if ($request->session()->has('coupon')) {
            $coupon = Session('coupon');
        } else {
            $coupon = null;
        }

        $size_product = null;
        foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
            $check = $product[] = Products::find($cart->id);
            $size_product[] = Size_products::where('id_size', $cart->options->size)->where('id_products', $check->id)->first();
        }
        return view('ajax.list-cart', compact('coupon', 'product', 'size_product'));
    }
}