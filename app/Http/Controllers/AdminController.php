<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use App\Products;
use App\Bill_detail;
use App\Bills;
use App\MessageCenter;
use App\Reviews;
use App\Categories;
use App\Size_products;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    //Index method for Admin Controller
    public function dashboard()
    {
        $products = Products::all();

        $reviews = Reviews::orderBy('created_at', 'DESC')->get();

        $products_include_sold = Bill_detail::withTrashed()->get();

        $bills = Bills::orderBy('created_at', 'DESC')->where('status', 0)->where('cancle', 0)->paginate(10);

        //10 Lasted bill inday
        $todayBills = Bills::whereDate('date_order', '=', date('Y-m-d'))->where('cancle', 0)->get();

        //Earning all bills with status = 1
        $earnings = Bills::withTrashed()->where('status', 1)->where('cancle', 0)->sum('total');

        // Get Bill detail each status = 1
        $bill_detail = Bill_detail::withTrashed()->where('status', 1)->where('cancle', 0)->get();

        //Bill pending uncomplete
        $pending_bills = Bills::where('status', 0)->where('cancle', 0)->get();

        //Total number products input to warehouse, include bills completed
        $total_products_input = Size_products::sum('quantity');
        $total_products_input += Bill_detail::withTrashed()->where('cancle', 0)->sum('quantity');

        //Total number products sold
        $products_sold = Bill_detail::withTrashed()->where('status', 1)->where('cancle', 0)->sum('quantity');

        //Total sold out of each products
        // $number_sold_out = Bill_detail::withTrashed()->where('status', 1)->sum('quantity');
        $number_sold_out = array();

        foreach ($products as $total) {
            $number_sold_out[] = Bill_detail::withTrashed()->where('status', 1)->where('id_product', $total->id)->where('cancle', 0)->sum('quantity');
        }

        //Number of product out of stock
        $outOfStock = 0;
        //Number of product 10 left quantity
        $leftQuantity = 0;
        foreach ($products as $item) {
            $check_outOfStock = Size_products::where('id_products', $item->id)->sum('quantity');
            if ($check_outOfStock < 1) {
                $outOfStock += 1;
            }
            if ($check_outOfStock < 11 && $check_outOfStock > 0) {
                $leftQuantity += 1;
            }
        }

        $month = array();

        for ($i = 0; $i < 12; $i++) {
            $month[$i] = Bills::withTrashed()->where('status', 1)->whereMonth('date_order', $i + 1)->where('cancle', 0)->sum('total');
        }

        $day = array();
        for ($i = 0; $i < 31; $i++) {
            $day[$i] = Bills::withTrashed()->where('status', 1)->whereDay('date_order', $i + 1)->whereMonth('date_order', date('m'))->where('cancle', 0)->sum('total');
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
            'day',
            'reviews'
        ));
    }

    public function addQuantity($id, $quantity, Request $request)
    {
        if ($request->ajax()) {
            if (!is_numeric($quantity) || !is_numeric($id)) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'The number you entered is not a numeric character !'
                ]);
            }
        }

        $products_id = Products::findOrFail($id);
        $products_id->amount += $quantity;
        $products_id->save();

        $products = Products::all();
        //Total sold out of each products
        $number_sold_out = array();
        foreach ($products as $total) {
            $number_sold_out[] = Bill_detail::withTrashed()->where('status', 1)->where('id_product', $total->id)->sum('quantity');
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
        return view('admin.ajaxdashboard', compact(
            'products',
            'outOfStock',
            'leftQuantity',
            'number_sold_out'
        ));
    }

    public function error404()
    {
        return view('admin.404');
    }

    public function notifications()
    {
        return view('admin.notifications');
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

    public function bills_read($id)
    {
        $message = MessageCenter::findOrFail($id);
        $bill_detail = Bill_detail::where('id_bill', $message->id_bill)->get();
        $message->reader = 1;
        $message->save();

        $total_price = 0;
        foreach ($bill_detail as $bill) {
            $total_price += $bill->total_price;
        }

        $id_bill_detail = Bill_detail::withTrashed()->where('id_bill', $message->id_bill)->first();
        if ($id_bill_detail) {
            $bills = Bills::withTrashed()->where('id', $id_bill_detail->id_bill)->first();
        } else {
            $bills = null;
        }
        return view('admin.bills.detailBills', compact('bill_detail', 'id_bill_detail', 'bills', 'total_price'));
    }

    public function reviews_read($id)
    {
        $message_reviews = MessageCenter::findOrFail($id);
        $message_reviews->reader = 1;
        $message_reviews->save();

        $product = Products::find($message_reviews->reivews->id_products);
        $id_product = Products::find($message_reviews->reivews->id_products);
        $related_products = Products::where('id_categories', $product->id_categories)->where('amount', '<>', 0)->where('id', '<>', $product->id)->inRandomOrder()->paginate(8);
        $categories = Categories::where('id_objects', $product->id_objects)->get();
        // $id_categories = Categories::find($id);
        $reviews = Reviews::where('id_products', $product->id)->get();
        $avgRating = DB::table('reviews')->where('id_products', $product->id)->avg('rating');
        $countRating = Reviews::where('id_products', $product->id)->where('rating', '>', 0)->get();
        return view('fashi.detail_product', compact('categories', 'product', 'related_products', 'reviews', 'avgRating', 'countRating', 'id_product'));
    }

    public function your_notifications(Request $request)
    {
        $your_notifications = MessageCenter::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.notifications', compact('your_notifications'));
    }

    public function mark_read($id)
    {
        $mark_read = MessageCenter::findOrFail($id);
        $mark_read->reader = 1;
        $mark_read->save();
        return back();
    }

    public function mark_all_read()
    {
        $mark_read = MessageCenter::all();
        foreach ($mark_read as $mark) {
            $find = MessageCenter::findOrFail($mark->id);
            $find->reader = 1;
            $find->save();
        }
        return back();
    }

    public function mark_unread($id)
    {
        $mark_read = MessageCenter::findOrFail($id);
        $mark_read->reader = 0;
        $mark_read->save();
        return back();
    }

    public function delete_notifications($id)
    {
        $mark_read = MessageCenter::findOrFail($id);
        $mark_read->delete();
        return back();
    }
}