<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Slide;
use App\Categories;
use App\Objects;

class SlideController extends Controller
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
        $slide = Slide::all();
        return view('admin.slide.list', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $none = Categories::findOrFail(1);
        $mans = Categories::where('id_objects', 2)->get();
        $womans = Categories::where('id_objects', 3)->get();
        $kids = Categories::where('id_objects', 4)->get();
        $objects = Objects::all();
        return view('admin.slide.create', compact('none', 'objects', 'mans', 'womans', 'kids'));
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
            'name' => 'string | max: 255',
            'description' => 'string',
            'id_categories' => 'numeric',
            'id_objects' => 'numeric',
            'link' => 'string | max:255',
            'image' => 'image | mimes:png,jpg,jpeg',
            'discount' => 'numeric',
        ]);

        $slide = new Slide();
        $slide->name = request('name');
        $slide->link = request('link');
        $slide->description = request('description');
        $slide->discount = request('discount');
        $slide->id_categories = request('id_categories');
        $slide->id_objects = request('id_objects');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/slide/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/slide", $image);
            $slide->image = $image;
        }
        $slide->user_created = Auth::user()->username;
        $slide->save();
        return redirect()->route('slide.create')->with('success', "Slide created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::withTrashed()->findOrFail($id);
        // return view('admin.slide.show', compact('slide'));
        return response()->json(['data' => $slide, 'name' => 'Khôi'], 200); // 200 là mã lỗi
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::withTrashed()->findOrFail($id);
        $none = Categories::findOrFail(1);
        $mans = Categories::where('id_objects', 2)->get();
        $womans = Categories::where('id_objects', 3)->get();
        $kids = Categories::where('id_objects', 4)->get();
        $objects = Objects::all();
        return view('admin.slide.edit', compact('slide', 'none', 'objects', 'mans', 'womans', 'kids'));
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
            'name' => 'string | max: 255',
            'description' => 'string',
            'id_categories' => 'numeric',
            'id_objects' => 'numeric',
            'link' => 'string | max:255',
            'image' => 'image | mimes:png,jpg,jpeg',
            'discount' => 'numeric',
        ]);

        $slide = Slide::withTrashed()->findOrFail($id);

        $slide->name = request('name');
        $slide->link = request('link');
        $slide->description = request('description');
        $slide->discount = request('discount');
        $slide->id_categories = request('id_categories');
        $slide->id_objects = request('id_objects');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/slide/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/slide", $image);
            if (!empty($slide->image)) {
                unlink("img/slide/" . $slide->image);
            }
            $slide->image = $image;
        }

        $slide->user_updated = Auth::user()->username;
        $slide->save();

        return redirect()->route('slide.edit', $slide->id)->with('success', "Slide updated!");
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
        $slide = Slide::findOrFail($id);
        Slide::find($id)->update(['user_deleted' => Auth::user()->username]);
        $slide->delete();

        return redirect()->route('slide.index')->with('delete', "Slide moved to trash!");
    }

    public function trashed(Request $request)
    {
        $slide = Slide::onlyTrashed()->get();
        return view('admin.slide.trash', compact('slide'));
    }

    public function restore($id)
    {
        $slide = Slide::onlyTrashed()->findOrFail($id);
        $slide->restore();

        return redirect()->route('slide.trash')->with('success', "Slide restored!");
    }

    public function restoreAll()
    {
        $slide = Slide::onlyTrashed()->get();
        if (count($slide) == 0) {
            return redirect()->route('slide.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Slide::onlyTrashed()->restore();
            return redirect()->route('slide.trash')->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $slide = Slide::onlyTrashed()->findOrFail($id);
        if (!empty($slide->image)) {
            unlink("img/slide/" . $slide->image);
        }
        $slide->forceDelete();
        return redirect()->route('slide.trash')->with('delete', "Slide $slide->name destroyed!");
    }

    public function deleteAll()
    {
        $slide = Slide::onlyTrashed()->get();

        foreach ($slide as $value) {
            if (!empty($value->image)) {
                unlink("img/slide/" . $value->image);
            }
        }
        if (count($slide) == 0) {
            return redirect()->route('slide.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            Slide::onlyTrashed()->forceDelete();
            return redirect()->route('slide.trash')->with('delete', "All data destroyed!");
        }
    }
}