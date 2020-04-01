<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Requests\ImageRequest;
use App\Image_large_products;

class ImageLargepProductsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('role:ROLE_ADMIN');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $large = Image_large_products::all();
        return view('admin.large.list', compact('large'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.large.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $large = new Image_large_products();
        $large->link = request('name');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/large/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/large", $image);
            $large->image = $image;
        }
        $large->user_created = Auth::user()->username;
        $large->save();
        return redirect()->route('large.create')->with('success', "Large created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $large = Image_large_products::withTrashed()->findOrFail($id);
        return view('admin.large.show', compact('large'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $large = Image_large_products::withTrashed()->findOrFail($id);
        return view('admin.large.edit', compact('large'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, $id)
    {
        $large = Image_large_products::withTrashed()->findOrFail($id);

        $large->link = request('name');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/large/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/large", $image);
            if (!empty($large->image)) {
                unlink("img/large/" . $large->image);
            }
            $large->image = $image;
        }

        $large->user_updated = Auth::user()->username;
        $large->save();

        return redirect()->route('large.edit', $large->id)->with('success', "Large updated!");
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
        $large = Image_large_products::findOrFail($id);
        Image_large_products::find($id)->update(['user_deleted' => Auth::user()->username]);
        $large->delete();

        return redirect()->route('large.index')->with('delete', "Large moved to trash!");
    }

    public function trashed(Request $request)
    {
        $large = Image_large_products::onlyTrashed()->get();
        return view('admin.large.trash', compact('large'));
    }

    public function restore($id)
    {
        $large = Image_large_products::onlyTrashed()->findOrFail($id);
        $large->restore();

        return redirect()->route('large.trash')->with('success', "Large restored!");
    }

    public function restoreAll()
    {
        $large = Image_large_products::onlyTrashed()->get();
        if (count($large) == 0) {
            return redirect()->route('large.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Image_large_products::onlyTrashed()->restore();
            return redirect()->route('large.trash')->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $large = Image_large_products::onlyTrashed()->findOrFail($id);
        if (!empty($large->image)) {
            unlink("img/large/" . $large->image);
        }
        $large->forceDelete();
        return redirect()->route('large.trash')->with('delete', "Large $large->name destroyed!");
    }

    public function deleteAll()
    {
        $large = Image_large_products::onlyTrashed()->get();

        foreach ($large as $value) {
            if (!empty($value->image)) {
                unlink("img/large/" . $value->image);
            }
        }
        if (count($large) == 0) {
            return redirect()->route('large.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            Image_large_products::onlyTrashed()->forceDelete();
            return redirect()->route('large.trash')->with('delete', "All data destroyed!");
        }
    }
}