<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Requests\BlogsRequest;
use App\Blogs;
use App\Categories;

class BlogsController extends Controller
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
        $blogs = Blogs::all();
        return view('admin.blogs.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::where('id_objects', 5)->get();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | min:2 | max:255 | string | regex:/^([a-zA-Z0-9]+)(\s[a-zA-Z0-9]+)*$/ |unique:blogs,',
            'description' => 'required | min:3 | string',
            'id_categories' => 'required | numeric',
            'image' => 'image | mimes:png,jpg,jpeg | max:8000'
        ]);
        $blogs = new Blogs();
        $blogs->title = ucwords(request('name'));
        $blogs->description = request('description');
        $blogs->id_categories = request('id_categories');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/blog/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/blog", $image);
            $blogs->image = $image;
        }
        $blogs->user_created = Auth::user()->username;
        $blogs->save();
        return redirect()->route('blogs.create')->with('success', "Blogs $blogs->title created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs = Blogs::withTrashed()->findOrFail($id);
        // return view('admin.blogs.show', compact('blogs'));
        return response()->json(['data' => $blogs, 'name' => 'Khôi'], 200); // 200 là mã lỗi
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = Blogs::withTrashed()->findOrFail($id);
        $categories = Categories::where('id_objects', 5)->get();

        return view('admin.blogs.edit', compact('blogs', 'categories'));
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
            'name' => 'required | min:2 | max:255 | string | regex:/^([a-zA-Z0-9]+)(\s[a-zA-Z0-9]+)*$/ |unique:blogs,title,' . $id,
            'description' => 'required | min:3 | string',
            'id_categories' => 'required | numeric',
            'image' => 'image | mimes:png,jpg,jpeg | max:8000'
        ]);
        $blogs = Blogs::withTrashed()->findOrFail($id);

        $blogs->title = ucwords(request('name'));
        $blogs->description = request('description');
        $blogs->id_categories = request('id_categories');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/blog/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/blog", $image);
            if (!empty($blogs->image)) {
                unlink("img/blog/" . $blogs->image);
            }
            $blogs->image = $image;
        }

        $blogs->user_updated = Auth::user()->username;
        $blogs->save();

        return redirect()->route('blogs.edit', $blogs->id)->with('success', "Blogs $blogs->title updated!");
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
        $blogs = Blogs::findOrFail($id);
        Blogs::find($id)->update(['user_deleted' => Auth::user()->username]);
        $blogs->delete();

        return redirect()->route('blogs.index')->with('delete', "Blogs $blogs->title moved to trash!");
    }

    public function trashed(Request $request)
    {
        $blogs = Blogs::onlyTrashed()->get();
        return view('admin.blogs.trash', compact('blogs'));
    }

    public function restore($id)
    {
        $blogs = Blogs::onlyTrashed()->findOrFail($id);
        $blogs->restore();

        return redirect()->route('blogs.trash')->with('success', "Blogs $blogs->title restored!");
    }

    public function restoreAll()
    {
        $blogs = Blogs::onlyTrashed()->get();
        if (count($blogs) == 0) {
            return redirect()->route('blogs.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Blogs::onlyTrashed()->restore();
            return redirect()->route('blogs.trash')->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $blogs = Blogs::onlyTrashed()->findOrFail($id);
        if (!empty($blogs->image)) {
            unlink("img/blog/" . $blogs->image);
        }
        $blogs->forceDelete();
        return redirect()->route('blogs.trash')->with('delete', "Blogs $blogs->title destroyed!");
    }

    public function deleteAll()
    {
        $blogs = Blogs::onlyTrashed()->get();

        foreach ($blogs as $value) {
            if (!empty($value->image)) {
                unlink("img/blog/" . $value->image);
            }
        }
        if (count($blogs) == 0) {
            return redirect()->route('blogs.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            Blogs::onlyTrashed()->forceDelete();
            return redirect()->route('blogs.trash')->with('delete', "All data destroyed!");
        }
    }
}