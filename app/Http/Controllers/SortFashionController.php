<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

use App\Slide;
use App\Image_large_products;
use App\Banners;
use App\Bill_detail;
use App\Bills;
use App\Categories;
use App\Instagrams;
use App\Products;
use App\Reviews;
use App\Blogs;
use App\Blogcomments;
use App\Contact;
use App\Customers;
use App\Subscribe;
use App\MessageCenter;
use App\Size;
use App\Size_products;
use Illuminate\Support\Facades\Crypt;

class SortFashionController extends Controller
{
    public function shopSortLowToHigh(Request $request)
    {
        $product = Products::orderBy('unit_price', 'ASC')->paginate(12);
        if ($request->ajax()) {
            return [
                'product' => view('ajax.shop')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        $count_product = Products::count();
        return view('fashi.shop')->with(compact('product', 'count_product'));
    }

    public function shopSortHighToLow(Request $request)
    {
        $product = Products::orderBy('unit_price', 'DESC')->paginate(12);
        if ($request->ajax()) {
            return [
                'product' => view('ajax.shop')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        $count_product = Products::count();
        return view('fashi.shop')->with(compact('product', 'count_product'));
    }

    public function shopSortPrice(Request $request)
    {
        $min = request('min');
        $max = request('max');
        $product = Products::where('unit_price', '>=', $min)->where('unit_price', '<=', $max)->orderBy('unit_price', 'ASC')->paginate(120000);
        $count_product = Products::where('unit_price', '>=', $min)->where('unit_price', '<=', $max)->orderBy('unit_price', 'ASC')->count();
        return view('fashi.shop')->with(compact('product', 'min', 'max', 'count_product'));
    }

    public function menSortLowToHigh(Request $request)
    {
        $product = Products::where('id_objects', 2)->orderBy('unit_price', 'ASC')->paginate(12);
        $count_product = Products::where('id_objects', 2)->count();
        $categories = Categories::where('id_objects', 2)->get();
        $tags = Categories::where('id_objects', 2)->get();
        if ($request->ajax()) {
            return [
                'product' => view('ajax.men')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.men', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function menSortHighToLow(Request $request)
    {
        $product = Products::where('id_objects', 2)->orderBy('unit_price', 'DESC')->paginate(12);
        $count_product = Products::where('id_objects', 2)->count();
        $categories = Categories::where('id_objects', 2)->get();
        $tags = Categories::where('id_objects', 2)->get();
        if ($request->ajax()) {
            return [
                'product' => view('ajax.men')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.men', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function menSortPrice(Request $request)
    {
        $min = request('min');
        $max = request('max');
        $product = Products::where('id_objects', 2)->where('unit_price', '>=', $min)->where('unit_price', '<=', $max)->orderBy('unit_price', 'ASC')->paginate(120000);
        $count_product = Products::where('id_objects', 2)->where('unit_price', '>=', $min)->where('unit_price', '<=', $max)->orderBy('unit_price', 'ASC')->count();
        $categories = Categories::where('id_objects', 2)->get();
        $tags = Categories::where('id_objects', 2)->get();
        return view('fashi.men')->with(compact('product', 'min', 'max', 'count_product', 'categories', 'tags'));
    }

    public function womenSortLowToHigh(Request $request)
    {
        $product = Products::where('id_objects', 3)->orderBy('unit_price', 'ASC')->paginate(12);
        $count_product = Products::where('id_objects', 3)->count();
        $categories = Categories::where('id_objects', 3)->get();
        $tags = Categories::where('id_objects', 3)->get();
        if ($request->ajax()) {
            return [
                'product' => view('ajax.men')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.women', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function womenSortHighToLow(Request $request)
    {
        $product = Products::where('id_objects', 3)->orderBy('unit_price', 'DESC')->paginate(12);
        $count_product = Products::where('id_objects', 3)->count();
        $categories = Categories::where('id_objects', 3)->get();
        $tags = Categories::where('id_objects', 3)->get();
        if ($request->ajax()) {
            return [
                'product' => view('ajax.men')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.women', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function womenSortPrice(Request $request)
    {
        $min = request('min');
        $max = request('max');
        $product = Products::where('id_objects', 3)->where('unit_price', '>=', $min)->where('unit_price', '<=', $max)->orderBy('unit_price', 'ASC')->paginate(120000);
        $count_product = Products::where('id_objects', 3)->where('unit_price', '>=', $min)->where('unit_price', '<=', $max)->orderBy('unit_price', 'ASC')->count();
        $categories = Categories::where('id_objects', 3)->get();
        $tags = Categories::where('id_objects', 3)->get();
        return view('fashi.women')->with(compact('product', 'min', 'max', 'count_product', 'categories', 'tags'));
    }

    public function kidSortLowToHigh(Request $request)
    {
        $product = Products::where('id_objects', 4)->orderBy('unit_price', 'ASC')->paginate(12);
        $count_product = Products::where('id_objects', 4)->count();
        $categories = Categories::where('id_objects', 4)->get();
        $tags = Categories::where('id_objects', 4)->get();
        if ($request->ajax()) {
            return [
                'product' => view('ajax.men')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.kid', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function kidSortHighToLow(Request $request)
    {
        $product = Products::where('id_objects', 4)->orderBy('unit_price', 'DESC')->paginate(12);
        $count_product = Products::where('id_objects', 4)->count();
        $categories = Categories::where('id_objects', 4)->get();
        $tags = Categories::where('id_objects', 4)->get();
        if ($request->ajax()) {
            return [
                'product' => view('ajax.men')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.kid', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function kidSortPrice(Request $request)
    {
        $min = request('min');
        $max = request('max');
        $product = Products::where('id_objects', 4)->where('unit_price', '>=', $min)->where('unit_price', '<=', $max)->orderBy('unit_price', 'ASC')->paginate(120000);
        $count_product = Products::where('id_objects', 4)->where('unit_price', '>=', $min)->where('unit_price', '<=', $max)->orderBy('unit_price', 'ASC')->count();
        $categories = Categories::where('id_objects', 4)->get();
        $tags = Categories::where('id_objects', 4)->get();
        return view('fashi.kid')->with(compact('product', 'min', 'max', 'count_product', 'categories', 'tags'));
    }
}