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
use Illuminate\Support\Facades\Crypt;

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

class FashionControllers extends Controller
{
    public function home()
    {
        $slide = Slide::all();
        $large_image1 = Image_large_products::take(1)->orderBy('id', 'asc')->get();
        $large_image2 = Image_large_products::take(1)->orderBy('id', 'desc')->get();
        $banners = Banners::where('position', '>', 0)->orderBy('position', 'asc')->take(3)->get();
        $instagram = Instagrams::take(6)->get();
        $men = Products::where('id_objects', 2)->where('new', 1)->inRandomOrder('4231')->get();
        $women = Products::where('id_objects', 3)->where('new', 1)->inRandomOrder('4231')->get();
        $blogs = Blogs::orderBy('view_count', 'DESC')->paginate(3);
        return view('fashi.home', compact('slide', 'large_image1', 'large_image2', 'banners', 'instagram', 'men', 'women', 'blogs'));
    }

    public function faq()
    {
        return view('fashi.faq');
    }

    public function contact()
    {
        return view('fashi.contact');
    }

    public function your_order(Request $request)
    {
        if (Auth::user()) {
            $order = Customers::where('username', Auth::user()->username)->first();
            if ($order != null) {
                $bill_order = Bills::withTrashed()->where('id_customer', $order->id)->orderBy('created_at', 'DESC')->paginate(5);
            } else {
                $bill_order = [];
            }
            if ($request->ajax() && (count($bill_order) > 5)) {
                return [
                    'bill_order' => view('ajax.yourOrder')->with(compact('bill_order'))->render(),
                    'next_page' => $bill_order->nextPageUrl()
                ];
            }
            return view('fashi.your_order', compact('bill_order'));
        } else {
            return redirect()->route('home')->with('toast_error', "You must log in to see your order !");
        }
    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email | min: 5 | max: 100 | unique:subscribe',
            'g-recaptcha-response' => 'required | captcha',
        ]);

        $subscribe = new Subscribe();
        $subscribe->email = request('email');
        $subscribe->save();
        return back()->with('toast', 'Thank you for following our website, we will send you emails when there are hot promotions...');
    }

    public function contactPost(Request $request)
    {
        $this->validate($request, [
            'contact_email' => 'required | email | min: 5 | max: 100',
            'contact_name' => 'required | string | min: 3 | max: 100',
            'contact_message' => 'required | string | min: 3 | max: 999',
            'g-recaptcha-response' => 'required | captcha',
        ]);

        $contact = new Contact();
        $contact->name = request('contact_name');
        $contact->email = request('contact_email');
        $contact->message = request('contact_message');
        $contact->save();
        return back()->with('toast', 'Thank you for suggestions, we will feedback you soon...');
    }


    public function checkout()
    {
        return view('fashi.checkout');
    }

    public function blog(Request $request)
    {
        if (request('search_blog')) {
            $request->session()->flash('search_post', request('search_blog'));
            $blogs = Blogs::where('id_objects', 5)->where('title', 'LIKE', '%' . request('search_blog') . '%')->paginate(800);
        } else {
            $blogs = Blogs::where('id_objects', 5)->paginate(8);
        }
        $category_blog = Categories::where('id_objects', 5)->get();
        $tags_category_blog = Categories::where('id_objects', 5)->get();
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
        $next_blog = Blogs::where('id', '>', $id)->orderBy('id', 'asc')->first();
        $comments = Blogcomments::where('id_blogs', 4)->get();
        return view('fashi.blogdetail', compact('blog', 'previous_blog', 'next_blog', 'comments', 'id_blog'));
    }

    public function comments(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required | min:10 | max:255 | string',
            'id_blogs' => 'required | numeric | min:0'
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

    public function find_bill($id)
    {
        $id = Crypt::decrypt($id);
        $code_bills = Bills::withTrashed()->findOrFail($id);
        if (!Auth::user()) {
            return redirect()->route('home')->with('toast_error', 'You must log in to see your order !');
        } elseif ((Auth::user()->username == $code_bills->customers->username) || Auth::check()) {
            $code_bills_detail = Bill_detail::withTrashed()->where('id_bill', $code_bills->id)->get();
            return view('fashi.code_bill', compact('code_bills', 'code_bills_detail'));
        } else {
            return redirect()->route('home')->with('toast_error', 'Invoice code or account is incorrect');
        }
    }

    public function shop(Request $request)
    {
        $this->validate($request, [
            'search_products' => 'max:255'
        ]);
        if (request('search_products')) {
            $request->session()->flash('search_products', request('search_products'));
            $product = Products::where('name', 'LIKE', '%' . request('search_products') . '%')->paginate(12);
            $count_product = Products::where('name', 'LIKE', '%' . request('search_products') . '%')->count();
        } else {
            $product = Products::inRandomOrder('1234')->paginate(12);
            $count_product = Products::count();
        }
        if ($request->ajax() && ($count_product > 12)) {
            return [
                'product' => view('ajax.shop')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.shop')->with(compact('product', 'count_product'));
    }

    public function reviews(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required | min:10 | max:255 | string',
            'id_products' => 'required | numeric | min:0'
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

        $message = new MessageCenter();
        $message->id_review = $reviews->id;
        $message->save();

        return Redirect::to(URL::previous() . "#location")->with('toast', 'Thanks for your review...');
    }

    public function men(Request $request)
    {
        $product = Products::where('id_objects', 2)->paginate(12);
        $count_product = Products::where('id_objects', 2)->count();
        $categories = Categories::where('id_objects', 2)->get();
        $tags = Categories::where('id_objects', 2)->get();
        if ($request->ajax() && ($count_product > 12)) {
            return [
                'product' => view('ajax.men')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.men', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function women(Request $request)
    {
        $product = Products::where('id_objects', 3)->paginate(12);
        $count_product = Products::where('id_objects', 3)->count();
        $categories = Categories::where('id_objects', 3)->get();
        $tags = Categories::where('id_objects', 3)->get();
        if ($request->ajax() && ($count_product > 12)) {
            return [
                'product' => view('ajax.women')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.women', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function kid(Request $request)
    {
        $product = Products::where('id_objects', 4)->paginate(12);
        $count_product = Products::where('id_objects', 4)->count();
        $categories = Categories::where('id_objects', 4)->get();
        $tags = Categories::where('id_objects', 4)->get();
        if ($request->ajax() && ($count_product > 12)) {
            return [
                'product' => view('ajax.kid')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.kid', compact('categories', 'product', 'tags', 'count_product'));
    }

    public function getProductMen(Request $request, $id)
    {
        $product = Products::where('id_categories', $id)->paginate(12);
        $count_product = Products::where('id_categories', $id)->count();
        $categories = Categories::where('id_objects', 2)->get();
        $tags = Categories::where('id_objects', 2)->get();
        $id_categories = Categories::find($id);
        if ($request->ajax() && ($count_product > 12)) {
            return [
                'product' => view('ajax.menProduct')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.men_type_product', compact('categories', 'product', 'id_categories', 'tags'));
    }

    public function getProductWomen(Request $request, $id)
    {
        $product = Products::where('id_categories', $id)->paginate(12);
        $count_product = Products::where('id_categories', $id)->count();
        $categories = Categories::where('id_objects', 3)->get();
        $tags = Categories::where('id_objects', 3)->get();
        $id_categories = Categories::find($id);
        if ($request->ajax() && ($count_product > 12)) {
            return [
                'product' => view('ajax.womenProduct')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.women_type_product', compact('categories', 'product', 'id_categories', 'tags'));
    }

    public function getProductKid(Request $request, $id)
    {
        $product = Products::where('id_categories', $id)->paginate(12);
        $count_product = Products::where('id_categories', $id)->count();
        $categories = Categories::where('id_objects', 4)->get();
        $tags = Categories::where('id_objects', 4)->get();
        $id_categories = Categories::find($id);
        if ($request->ajax() && ($count_product > 12)) {
            return [
                'product' => view('ajax.kidProduct')->with(compact('product'))->render(),
                'next_page' => $product->nextPageUrl()
            ];
        }
        return view('fashi.kid_type_product', compact('categories', 'product', 'id_categories', 'tags'));
    }

    public function getDetailProduct($name)
    {
        $slugs = explode("-", str_replace('-', ' ', $name));
        $find_product = Products::where('name', 'LIKE', ucwords($slugs[0]))->first();
        $id = $find_product->id;
        $productKey = 'product_' . $id;
        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($productKey)) {
            Products::where('id', $id)->increment('view_count');
            Session::put($productKey, 1);
        }
        $product = Products::find($id);
        $id_product = Products::find($id);
        $related_products = Products::where('id_categories', $product->id_categories)->where('id', '<>', $product->id)->inRandomOrder()->paginate(8);
        $categories = Categories::where('id_objects', $product->id_objects)->get();
        $id_categories = Categories::find($id);
        $reviews = Reviews::where('id_products', $product->id)->get();
        $avgRating = DB::table('reviews')->where('id_products', $product->id)->avg('rating');
        $countRating = Reviews::where('id_products', $product->id)->where('rating', '>', 0)->get();
        return view('fashi.detail_product', compact('categories', 'product', 'id_categories', 'related_products', 'reviews', 'avgRating', 'countRating', 'id_product'));
    }

    public function cancleOrder($id)
    {
        $bill = Bills::withTrashed()->findOrFail($id);
        if ((strtotime("now") - strtotime($bill->created_at)) < 86400 && $bill->cancle == 0 && $bill->status == 0) {
            $bill->cancle = 1;
            $bill->save();

            $notification = MessageCenter::where('id_bill', $id)->first();
            $notification->reader = 0;
            $notification->save();

            $bill_detail = Bill_detail::withTrashed()->where('id_bill', $bill->id)->get();
            foreach ($bill_detail as $item) {
                $cancle_bill_detail = Bill_detail::withTrashed()->findOrFail($item->id);
                $cancle_bill_detail->cancle = 1;
                $cancle_bill_detail->save();

                $size_name = Size::where('name', $cancle_bill_detail->size)->first();
                $product_restore = Size_products::where('id_products', $cancle_bill_detail->id_product)->where('id_size', $size_name->id)->first();
                $product_restore->quantity += $cancle_bill_detail->quantity;
                $product_restore->save();
            }
            return back()->with('toast', "You have successfully canceled this order !");
        } else {
            return back()->with('toast', "There was an error canceling this order !");
        }
    }
}