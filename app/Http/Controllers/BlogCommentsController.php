<?php

namespace App\Http\Controllers;

use App\Comment;

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
        $reviews = Comment::where('commentable_id', $id)->get();
        return view('admin.comments.list', compact('reviews'));
    }

    public function destroy($id)
    {
        $comments = Comment::findOrFail($id);
        $comments->delete();
        return redirect()->back()->with('delete', "Comments of $comments->guest_name deleted!");
    }
}