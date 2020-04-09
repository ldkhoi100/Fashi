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

        foreach (Cart::content() as $cart) {
            $product[] = Products::find($cart->id);
            $check_amount = Products::find($cart->id);

            //Check if in cart of customer, product out of stock
            if ($check_amount->amount <= 0) {
                Cart::remove($cart->rowId);
                $request->session()->flash('error', "Product $check_amount->name has sold out, sincerely sorry!");
            }
        }

        //Request coupon code in function coupon()
        if ($request->session()->has('coupon')) {
            $coupon = Session('coupon');
        } else {
            $coupon = null;
        }

        if (Auth::user()) {
            return view('fashi.shoppingcart', compact("product", "coupon"));
        } else {
            return view('fashi.checkout', compact("product", "coupon"));
        }
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
            "size.*" => "required | numeric | min:0"
        ]);
        $oderdetail = array();

        if (request('qty') > request('check_availability')) {
            return redirect()->back()->with('error', 'The quantity of products you entered is incorrect');
        } else {
            if (Auth::user()) {
                $check_customer = Customers::where('username', Auth::user()->username)->first();

                // Check if user current have made a previous purchase
                if ($check_customer == true) {
                    $id_customer = $check_customer->id;
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
                if ($check_customer == true) {
                    $data["id_customer"] = $id_customer;
                } else {
                    $data["id_customer"] = $customer->id;
                }
                $data["date_order"] = date('Y-m-d H:i:s');
                $data["total"] = Cart::total();
                $data["payment"] = $request->payment;
                $bills = Bills::create($data);
                $id_order = $bills->id;
                $bill_detail = [];

                $i = 0;
                foreach (Cart::content() as $key => $cart) {
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
                    if ($coupon == true) {
                        $coupon->used = 1;
                        $coupon->user_used = Auth::user()->username;
                        $coupon->save();
                    }
                }

                // if ($check_customer == true) {
                //     Mail::to($check_customer->email)->send(new ShoppingMail($bills, $oderdetail));
                // } else {
                //     Mail::to($customer->email)->send(new ShoppingMail($bills, $oderdetail));
                // }
                Cart::destroy();
                return redirect()->route('home')->with('toast', 'You have successfully placed an order! We will send a mail to confirm your order today');
            } else { }
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
                $data["total"] = Cart::total();
                $data["payment"] = $request->payment;
                $bills = Bills::create($data);

                $id_order = $bills->id;
                $bill_detail = [];

                $i = 0;
                foreach (Cart::content() as $key => $cart) {
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
                Cart::destroy();
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
        $amount = Cart::get($id)->id;
        if ($request->ajax()) {
            if (request('qty') <= 0) {
                return response()->json(['error' => 'Minimum quantity is 1']);
            }
            $product = Products::find($amount);
            if (request('qty') > $product->amount) {
                return response()->json(['error' => "Quantity of <b>$product->name</b> is less than $product->amount"]);
            }
            Cart::update($id, request('qty'));
            return response()->json(['result' => 'Update quantity success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cart::destroy();
        // return redirect()->route('home')->with('You have canceled the entire product!');
    }

    public function addCart($id, Request $request)
    {
        $qty = null;
        $product = Products::findOrFail($id);

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

        Cart::add([
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
        return redirect()->back()->with('toast', "You have successfully placed an order $product->name");
    }

    public function deleteCart($id)
    {
        $cart = Cart::get($id);
        Cart::remove($id);
        return redirect()->back()->with('toast', "You have successfully remove item $cart->name out of cart...");
    }

    public function coupons(Request $request)
    {
        $this->validate($request, [
            'code' => 'required | string | min:5 | max: 20',
        ]);

        $coupon = Coupons::where('id_coupon', request('code'))->where('used', 0)->first();
        $check_used_coupon = Coupons::where('id_coupon', request('code'))->where('used', 1)->first();

        if ($coupon == true) {
            Cart::setGlobalDiscount($coupon->discount);
            $request->session()->put('coupon', request('code'));
            return back()->with('success', "Success, you will receive $coupon->discount% discount on the total invoice, discount codes will be invalidated after payment!");
        } elseif ($check_used_coupon == true) {
            return back()->with('error', 'Coupon code have been used!');
        } else {
            return back()->with('error', 'The discount code you entered is incorrect!');
        }
    }
}