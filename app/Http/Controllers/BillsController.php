<?php

namespace App\Http\Controllers;

use DateTime;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

use App\Bills;
use App\Customers;
use App\Bill_detail;

class BillsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('role:ROLE_ADMIN');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bills::all();
        $list = Bill_detail::all();
        return view('admin.bills.list', compact('bills', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Code
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //code
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bills::withTrashed()->findOrFail($id);
        $customer = Customers::withTrashed()->findOrFail($bill->id_customer);
        // return view('admin.products.show', compact('product'));
        return response()->json(['data' => $customer, 'name' => 'Khôi'], 200); // 200 là mã lỗi
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bills = Bills::withTrashed()->findOrFail($id);
        $customer = Customers::withTrashed()->findOrFail($bills->id_customer);
        return view('admin.bills.edit', compact('bills', 'customer'));
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
            'name' => 'required | min:5 | max:255 | string',
            'address' => 'required | min:5 | max:255 | string',
            'phone' => 'required | numeric',
            'pay_money' => 'required | numeric',
            'status' => 'required | numeric',
            'total' => 'required | numeric',
        ]);

        $bill = Bills::withTrashed()->findOrFail($id);
        $customer = Customers::withTrashed()->findOrFail($bill->id_customer);

        $customer->name = request('name');
        $customer->address = request('address');
        $customer->postcode = request('postcode');
        $customer->city = request('city');
        $customer->country = request('country');
        $customer->phone = request('phone');
        $bill->pay_money = request('pay_money');
        $bill->status = request('status');
        $bill->total = request('total');

        $bill->user_updated = Auth::user()->username;
        $customer->user_updated = Auth::user()->username;
        $customer->save();
        $bill->save();

        return redirect()->back()->with('success', "Bills $bill->id updated!");
    }

    /**
     * Remove the specified resource from storage.
     * Move to trash
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bills::findOrFail($id);
        Bills::find($id)->update(['user_deleted' => Auth::user()->username]);
        $bill->delete();

        return redirect()->route('bills.index')->with('delete', "Bills $bill->id moved to trash!");
    }

    public function trashed(Request $request)
    {
        $bills = Bills::onlyTrashed()->get();
        return view('admin.bills.trash', compact('bills'));
    }

    public function restore($id)
    {
        $bill = Bills::onlyTrashed()->findOrFail($id);
        $bill->restore();

        return redirect()->route('bills.trash')->with('success', "Bills $bill->id restored!");
    }

    public function restoreAll()
    {
        $bill = Bills::onlyTrashed()->get();
        if (count($bill) == 0) {
            return redirect()->route('bills.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Bills::onlyTrashed()->restore();
            return redirect()->route('bills.trash')->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $bill = Bills::onlyTrashed()->findOrFail($id);
        $bill->bill_detail()->forceDelete();
        $bill->forceDelete();
        return redirect()->route('bills.trash')->with('delete', "Bills $bill->id destroyed!");
    }

    public function deleteAll()
    {
        $bill = Bills::onlyTrashed()->get();


        if (count($bill) == 0) {
            return redirect()->route('bills.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            foreach ($bill as $item) {
                $item->bill_detail()->forceDelete();
                $item->forceDelete();
            }
            return redirect()->route('bills.trash')->with('delete', "All data destroyed!");
        }
    }

    public function pay_money($id)
    {
        $bill = Bills::withTrashed()->findOrFail($id);
        $bill->pay_money = !$bill->pay_money;
        $bill->save();
        return redirect()->back()->with('success', "Bills $bill->id changed column pay money");
    }

    public function status($id)
    {
        $bill = Bills::withTrashed()->findOrFail($id);
        $bill->status = !$bill->status;
        $bill->save();
        return redirect()->back()->with('success', "Bills $bill->id changed column status");
    }

    public function detailBills($id)
    {
        $bill_detail = Bill_detail::where('id_bill', $id)->get();
        return view('admin.bills.detailBills', compact('bill_detail'));
    }

    public function statusDetailBills($id)
    {
        $bill = Bill_detail::withTrashed()->findOrFail($id);
        $bill->status = !$bill->status;
        $bill->save();
        return redirect()->back()->with('success', "Bills $bill->id_bill changed column status");
    }
}