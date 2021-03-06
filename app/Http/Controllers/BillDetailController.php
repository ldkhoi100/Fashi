<?php

namespace App\Http\Controllers;

use App\Bill_detail;
use App\Bills;
use App\Products;
use App\Size;
use App\Size_products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //code
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bills = Bill_detail::withTrashed()->findOrFail($id);
        $product = Products::withTrashed()->where('id', $bills->id_product)->first();
        $sizes = Size::all();
        $size_product = Size_products::where('id_products', $bills->id_product)->get();
        return view('admin.bills.editBillDetail', compact('bills', 'product', 'sizes', 'size_product'));
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
        $this->validate($request, [
            'size' => 'required | string | min:0',
            'quantity' => 'required | numeric | min:0',
            'status' => 'required | numeric | boolean',
            'discount' => 'required | numeric | between:0,100',
        ]);

        $bill = Bill_detail::withTrashed()->findOrFail($id); // 132
        $product = Products::withTrashed()->where('id', $bill->id_product)->first();
        $size_product = Size_products::where('id_products', $bill->id_product)->get();
        $code_bill = Bills::withTrashed()->findOrFail($bill->id_bill);
        $size_check = Size_products::where('id_products', $product->id)->get();

        foreach ($size_check as $check_size) {
            if ($check_size->size->name == request('size')) {
                if (request('quantity') > $check_size->quantity) {
                    return back()->with('error', "Error, \"$product->name\" Exceeded quantity in stock! Maximum is $check_size->quantity !");
                }
            }
        }

        if ($product->promotion_price > 0) {
            $price = $product->promotion_price;
        } else {
            $price = $product->unit_price;
        }
        $bool = true;
        $total = 0;
        foreach ($size_product as $size) {
            if (request('size') == $size->size->name) {
                $bill->size = request('size');
                $bill->quantity = request('quantity');
                $bill->discount = request('discount');
                $bill->total_price = (request('quantity') * $price) - (request('discount') * (request('quantity') * $price) / 100);
                $bill->status = request('status');
                Bill_detail::withTrashed()->findOrFail($id)->update(['user_updated' => Auth::user()->username]);
                $bill->save();

                $amountBill = Bill_detail::withTrashed()->where('id_bill', $bill->id_bill)->get();
                foreach ($amountBill as $price) {
                    $total += $price->total_price;
                }
                $code_bill->total = $total;
                $code_bill->save();
                return back()->with('success', "Update bill detail $bill->id success!");
            } else {
                $bool = false;
            }
        }
        if ($bool == false) {
            return back()->with('error', "Error, Please select the correct size of this product - $product->name!");
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
        $bill = Bill_detail::findOrFail($id);
        Bill_detail::find($id)->update(['user_deleted' => Auth::user()->username]);
        $code_bill = Bills::withTrashed()->findOrFail($bill->id_bill);
        $bill->delete();
        $total = 0;
        $amountBill = Bill_detail::withTrashed()->where('id_bill', $bill->id_bill)->get();

        foreach ($amountBill as $price) {
            $total += $price->total_price;
        }

        $code_bill->total = $total;
        $code_bill->save();

        $bill_detail = Bill_detail::where('id_bill', $bill->id_bill)->get();
        return view('admin.bills.ajax.detail_list', compact('bill_detail'));
    }

    public function trashed(Request $request, $id)
    {
        $bill_detail = Bill_detail::onlyTrashed()->where('id_bill', $id)->get();
        $id_bill_detail = Bill_detail::withTrashed()->where('id_bill', $id)->first();
        $id_bills = Bills::withTrashed()->where('id', $id_bill_detail->id_bill)->first();
        return view('admin.bills.trashBillDetail', compact('bill_detail', 'id_bill_detail', 'id_bills'));
    }

    public function restore($id)
    {
        $bill = Bill_detail::withTrashed()->findOrFail($id);
        $bill->restore();
        $code_bill = Bills::withTrashed()->findOrFail($bill->id_bill);
        $total = 0;
        $amountBill = Bill_detail::withTrashed()->where('id_bill', $bill->id_bill)->get();
        foreach ($amountBill as $price) {
            $total += $price->total_price;
        }
        $code_bill->total = $total;
        $code_bill->save();

        $bill_detail = Bill_detail::onlyTrashed()->where('id_bill', $id)->get();
        return view('admin.bills.ajax.detail_trash', compact('bill_detail'));
    }

    public function restoreAll()
    {
        $bills = Bill_detail::onlyTrashed()->get();
        if (count($bills) == 0) {
            return redirect()->route('bills.trash')->with('delete', "Clean trash, nothing to restore!");
        } else {
            $total = 0;
            foreach ($bills as $bill) {
                $bill->restore();
                $code_bill = Bills::withTrashed()->where('id', $bill->id_bill)->first();
            }

            $amountBill = Bill_detail::withTrashed()->where('id_bill', $bill->id_bill)->get();
            foreach ($amountBill as $price) {
                $total += $price->total_price;
            }

            $code_bill->total = $total;
            $code_bill->save();
            return back()->with('success', "Success, all data of bill $code_bill->id restored!");
        }
    }

    public function delete($id)
    {
        $bill_detail = Bill_detail::onlyTrashed()->findOrFail($id);
        $bill_detail->forceDelete();
        $bill_detail = Bill_detail::onlyTrashed()->where('id_bill', $id)->get();
        return view('admin.bills.ajax.detail_trash', compact('bill_detail'));
    }

    public function deleteAll()
    {
        $bill_detail = Bill_detail::onlyTrashed()->get();

        if (count($bill_detail) == 0) {
            return redirect()->route('bills.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            foreach ($bill_detail as $item) {
                $code_bill = Bills::withTrashed()->where('id', $item->id_bill)->first();
                $item->forceDelete();
            }
            return back()->with('error', "All data of bill $code_bill->id destroyed!");
        }
    }
}