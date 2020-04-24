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

use App\Reviews;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function show($id)
    {
        $reviews = Reviews::where('id_products', $id)->orderBy('rating', 'desc')->get();
        $product = Reviews::where('id_products', $id)->take(1);
        return view('admin.reviews.list', compact('reviews', 'product'));
    }

    public function destroy($id)
    {
        $reviews = Reviews::findOrFail($id);
        $reviews->delete();

        return redirect()->back()->with('delete', "Reviews of $reviews->name deleted!");
    }
}