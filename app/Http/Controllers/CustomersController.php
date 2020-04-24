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

use App\Customers;
use App\Customers_detail;
use App\Bill_detail;
use App\Bills;

class CustomersController extends Controller
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
        $customers = Customers::all();
        return view('admin.customers.list', compact('customers'));
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
        $customers = Customers::withTrashed()->findOrFail($id);
        return view('admin.customers.edit', compact('customers'));
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
            'email' => 'required | min:5 | max:255 | email',
            'address' => 'required | min:5 | max:255 | string',
            'city' => 'required | min:1 | max:255 | string',
            'country' => 'required | min:1 | max:255 | string',
            'phone' => 'required | numeric | min:0',
        ]);

        $customer = Customers::withTrashed()->findOrFail($id);

        $customer->name = request('name');
        $customer->email = request('email');
        $customer->address = request('address');
        $customer->postcode = request('postcode');
        $customer->city = request('city');
        $customer->country = request('country');
        $customer->phone = request('phone');
        $customer->user_updated = Auth::user()->username;
        $customer->save();

        return redirect()->back()->with('success', "Customer $customer->name updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = Customers::findOrFail($id);
        Customers::find($id)->update(['user_deleted' => Auth::user()->username]);

        $bills = Bills::where('id_customer', $customers->id)->get();

        foreach ($bills as $bill) {
            $find_bills_detail = Bill_detail::where('id_bill', $bill->id)->get();
            foreach ($find_bills_detail as $delete_item) {
                $delete_bills_detail = Bill_detail::findOrFail($delete_item->id);
                $delete_bills_detail->delete();
            }
        }

        $customers->bills()->delete();
        $customers->delete();
        return back()->with("success", "Customer $customers->name deleted, and all bill and bill details of this customer deleted, you can restore in garbage can!");
    }

    public function trashed(Request $request)
    {
        $customers = Customers::onlyTrashed()->get();
        return view('admin.customers.trash', compact('customers'));
    }

    public function restore($id)
    {
        $customers = Customers::onlyTrashed()->findOrFail($id);
        $bills = Bills::onlyTrashed()->where('id_customer', $customers->id)->get();


        foreach ($bills as $bill) {
            $find_bills_detail = Bill_detail::onlyTrashed()->where('id_bill', $bill->id)->get();
            foreach ($find_bills_detail as $delete_item) {
                $delete_bills_detail = Bill_detail::onlyTrashed()->findOrFail($delete_item->id);
                $delete_bills_detail->restore();
            }
        }

        $customers->bills()->restore();
        $customers->restore();

        return redirect()->route('customers.trash')->with('success', "customers $customers->name restored!");
    }

    public function delete($id)
    {
        $customers = Customers::onlyTrashed()->findOrFail($id);
        $bills = Bills::onlyTrashed()->where('id_customer', $customers->id)->get();
        // Products::find($id)->update(['user_deleted' => Auth::user()->username]);

        foreach ($bills as $bill) {
            $find_bills_detail = Bill_detail::onlyTrashed()->where('id_bill', $bill->id)->get();
            foreach ($find_bills_detail as $delete_item) {
                $delete_bills_detail = Bill_detail::onlyTrashed()->findOrFail($delete_item->id);
                $delete_bills_detail->forceDelete();
            }
        }

        $customers->bills()->forceDelete();
        $customers->forceDelete();
        return redirect()->route('customers.trash')->with('delete', "customers $customers->id destroyed!");
    }

    public function restoreAll()
    {
        $customers = Customers::onlyTrashed()->get();
        if (count($customers) == 0) {
            return redirect()->route('customers.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Customers::onlyTrashed()->restore();
            return redirect()->route('customers.trash')->with('success', "All data restored!");
        }
    }

    public function deleteAll()
    {
        $customers = Customers::onlyTrashed()->get();


        if (count($customers) == 0) {
            return redirect()->route('customers.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            foreach ($customers as $item) {
                $item->customers_detail()->forceDelete();
                $item->forceDelete();
            }
            return redirect()->route('customers.trash')->with('delete', "All data destroyed!");
        }
    }

    public function active($id)
    {
        $customers = Customers::withTrashed()->findOrFail($id);
        $customers->active = !$customers->active;
        $customers->save();
        return redirect()->back()->with('success', "Customer $customers->name updated active column!");
    }
}