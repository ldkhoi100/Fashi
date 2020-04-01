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

use App\Slide;
use App\Image_large_products;
use App\Banners;
use App\Categories;
use App\Instagrams;
use App\Products;
use App\Reviews;
use App\Blogs;
use App\Blogcomments;

class FashionControllers extends Controller
{
    public function home()
    {
        $slide = Slide::all();
        $large_image1 = Image_large_products::take(1)->orderBy('id', 'asc')->get();
        $large_image2 = Image_large_products::take(1)->orderBy('id', 'desc')->get();
        $banners = Banners::where('position', '>', 0)->orderBy('position', 'asc')->take(3)->get();
        $instagram = Instagrams::take(6)->get();
        $product = Products::where('id_objects', 2)->where('amount', '>', 0)->inRandomOrder('4231')->get();
        return view('fashi.home', compact('slide', 'large_image1', 'large_image2', 'banners', 'instagram', 'product'));
    }

    public function product()
    {
        return view('fashi.product');
    }

    public function shoppingcart()
    {
        return view('fashi.shoppingcart');
    }

    public function register()
    {
        return view('fashi.register');
    }

    public function login()
    {
        return view('fashi.login');
    }

    public function faq()
    {
        return view('fashi.faq');
    }

    public function contact()
    {
        return view('fashi.contact');
    }

    public function checkout()
    {
        return view('fashi.checkout');
    }

    public function blog()
    {
        $category_blog = Categories::where('id_objects', 5)->get();
        $tags_category_blog = Categories::where('id_objects', 5)->get();
        $blogs = Blogs::where('id_objects', 5)->paginate(8);
        $new_blogs = Blogs::where('id_objects', 5)->orderBy('created_at', 'desc')->paginate(4);
        return view('fashi.blog', compact('category_blog', 'blogs', 'new_blogs', 'tags_category_blog'));
    }

    public function getCategoriesBlog(Request $request, $id)
    {
        $category_blog = Categories::where('id_objects', 5)->get();
        $id_categories_blog = Categories::findOrFail($id);
        $tags_category_blog = Categories::where('id_objects', 5)->get();
        $blogs = Blogs::where('id_objects', 5)->where('id_categories', $id)->paginate(8);
        $new_blogs = Blogs::where('id_objects', 5)->orderBy('created_at', 'desc')->paginate(4);
        return view('fashi.blog_categories', compact('category_blog', 'blogs', 'new_blogs', 'tags_category_blog', 'id_categories_blog'));
    }

    public function blogdetail($id)
    {
        $blogKey = 'blog_' . $id;
        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($blogKey)) {
            Blogs::where('id', $id)->increment('view_count');
            Session::put($blogKey, 1);
        }

        $blog = Blogs::findOrFail($id);
        $id_blog = Blogs::find($id);
        $previous_blog = Blogs::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next_blog = Blogs::where('id', '>', $id)->orderBy('id', 'desc')->first();
        $comments = Blogcomments::where('id_blogs', 4)->get();
        return view('fashi.blogdetail', compact('blog', 'previous_blog', 'next_blog', 'comments', 'id_blog'));
    }

    public function comments(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required | min:30 | max:255 |string',
            'id_blogs' => 'required | numeric'
        ]);
        $reviews = new Blogcomments();

        if (Auth::user()) {
            $reviews->name = Auth::user()->name;
            $reviews->email = Auth::user()->email;
            $reviews->user_created = Auth::user()->username;
        } else {
            $reviews->name = request('name');
            $reviews->email = request('email');
        }
        $reviews->comment = request('comment');
        $reviews->id_blogs = request('id_blogs');
        $reviews->save();
        return redirect()->back()->with('toast', 'Thanks for your comments...');
    }

    public function shop(Request $request)
    {
        $product = Products::inRandomOrder('4123')->paginate(12);
        if ($request->ajax()) {
            return [
                'product' => view('ajax.shop')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.shop')->with(compact('product'));
        // return view('fashi.shop', compact('product'));
    }

    public function reviews(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required | min:30 | max:255 |string',
            'id_products' => 'required | numeric'
        ]);
        $reviews = new Reviews();

        if (Auth::user()) {
            $reviews->name = Auth::user()->name;
            $reviews->email = Auth::user()->email;
            $reviews->user_created = Auth::user()->username;
        } else {
            $reviews->name = request('name');
            $reviews->email = request('email');
        }
        if (request('rating')) {
            $reviews->rating = request('rating');
        }
        $reviews->comment = request('comment');
        $reviews->id_products = request('id_products');
        $reviews->save();
        return Redirect::to(URL::previous() . "#location")->with('toast', 'Thanks for your review...');
    }

    public function men(Request $request)
    {
        $product = Products::where('id_objects', 2)->paginate(12);
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

    public function getProductMen(Request $request, $id)
    {
        $product = Products::where('id_categories', $id)->paginate(9);
        $categories = Categories::where('id_objects', 2)->get();
        $tags = Categories::where('id_objects', 2)->get();
        $id_categories = Categories::find($id);
        if ($request->ajax()) {
            return [
                'product' => view('ajax.menProduct')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.men_type_product', compact('categories', 'product', 'id_categories', 'tags'));
    }

    public function getDetailProductMen($id)
    {
        $productKey = 'product_' . $id;

        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($productKey)) {
            Products::where('id', $id)->increment('view_count');
            Session::put($productKey, 1);
        }

        $product = Products::find($id);
        $id_product = Products::find($id);
        $related_products = Products::where('id_categories', $product->id_categories)->where('amount', '<>', 0)->where('id', '<>', $product->id)->inRandomOrder()->paginate(8);
        $categories = Categories::where('id_objects', 2)->get();
        $id_categories = Categories::find($id);
        $reviews = Reviews::where('id_products', $product->id)->get();
        $avgRating = DB::table('reviews')->where('id_products', $product->id)->avg('rating');
        $countRating = Reviews::where('id_products', $product->id)->where('rating', '>', 0)->get();
        return view('fashi.men_detail_product', compact('categories', 'product', 'id_categories', 'related_products', 'reviews', 'avgRating', 'countRating', 'id_product'));
    }



    //'categories', 'product', 'name_categories'
    public function women()
    {
        $product = Products::where('id_objects', 2)->inRandomOrder('4231')->get();
        $categories = Categories::where('id_objects', 2)->get();
        $tags = Categories::where('id_objects', 2)->get();
        return view('fashi.women', compact('categories', 'product', 'tags'));
    }

    public function kid()
    {
        return view('fashi.kid');
    }
}