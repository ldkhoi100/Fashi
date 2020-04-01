<?php

namespace App\Http\Controllers;

use App\Blogcomments;

use DateTime;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class BlogCommentsController extends Controller
{
    public function show($id)
    {
        $reviews = Blogcomments::where('id_blogs', $id)->get();
        // $product = Blogcomments::where('id_blogs', $id)->take(1);
        return view('admin.comments.list', compact('reviews'));
    }

    public function destroy($id)
    {
        $comments = Blogcomments::findOrFail($id);
        $comments->delete();

        return redirect()->back()->with('delete', "Comments of $comments->name deleted!");
    }
}