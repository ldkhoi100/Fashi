<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Products;
use App\Bill_detail;
use App\Bills;

class AdminController extends Controller
{
    //Index method for Admin Controller
    public function dashboard()
    {
        $products = Products::all();
        $products_include_sold = Bill_detail::withTrashed()->get();
        $bills = Bills::orderBy('created_at', 'DESC')->where('status', 0)->paginate(10);

        //10 Lasted bill inday
        $todayBills = Bills::whereDate('date_order', '=', date('Y-m-d'))->get();

        //Earning all bills with status = 1
        $bill_earnings = Bills::withTrashed()->where('status', 1)->get();

        // Get Bill detail each status = 1
        $bill_detail = Bill_detail::withTrashed()->where('status', 1)->get();

        //Bill pending uncomplete
        $pending_bills = Bills::where('status', 0)->get();

        //Total number products input to warehouse, include bills completed
        $total_products_input = 0;

        //Total number products sold
        $products_sold = 0;

        //Total sold out of each products
        $number_sold_out = array();

        foreach ($products as $total) {
            $total_products_input += $total->amount;
            $number_sold_out[] = Bill_detail::withTrashed()->where('status', 1)->where('id_product', $total->id)->sum('quantity');
        }

        foreach ($products_include_sold as $total) {
            $total_products_input += $total->quantity;
        }

        foreach ($bill_detail as $total) {
            $products_sold += $total->quantity;
        }

        $earnings = 0;
        foreach ($bill_earnings as $item) {
            $earnings += $item->total;
        }

        //Number of product out of stock
        $outOfStock = 0;
        //Number of product 10 left quantity
        $leftQuantity = 0;
        foreach ($products as $item) {
            if ($item->amount < 1) {
                $outOfStock += 1;
            }
            if ($item->amount < 11) {
                $leftQuantity += 1;
            }
        }

        $month = array();
        for ($i = 0; $i < 12; $i++) {
            $month[$i] = Bills::withTrashed()->where('status', 1)->whereMonth('date_order', $i + 1)->sum('total');
        }

        $day = array();
        for ($i = 0; $i < 31; $i++) {
            $day[$i] = Bills::withTrashed()->where('status', 1)->whereDay('date_order', $i + 1)->sum('total');
        }

        return view('admin.dashboard', compact(
            'products',
            'outOfStock',
            'leftQuantity',
            'bills',
            'todayBills',
            'earnings',
            'total_products_input',
            'products_sold',
            'pending_bills',
            'number_sold_out',
            'month',
            'day'
        ));
    }

    public function addQuantity(Request $request, $id)
    {
        $this->validate($request, [
            'quantity' => 'required | numeric',
        ]);
        $products = Products::findOrFail($id);
        $products->amount += request('quantity');
        $products->save();
        return back()->with('success', "Success, quantity of products \"$products->name\" with id $products->id updated!");
    }

    public function error404()
    {
        return view('admin.404');
    }

    public function blank()
    {
        return view('admin.blank');
    }

    public function button()
    {
        return view('admin.button');
    }

    public function card()
    {
        return view('admin.card');
    }

    public function chart()
    {
        return view('admin.chart');
    }

    public function forgotpassword()
    {
        return view('admin.forgot-password');
    }

    public function table()
    {
        return view('admin.table');
    }

    public function loginadmin()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function animation()
    {
        return view('admin.utilities.animation');
    }

    public function border()
    {
        return view('admin.utilities.border');
    }

    public function color()
    {
        return view('admin.utilities.color');
    }

    public function orther()
    {
        return view('admin.utilities.orther');
    }
}