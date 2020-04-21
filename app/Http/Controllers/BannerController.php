<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Requests\ImageRequest;
use App\Banners;
use App\Objects;

class BannerController extends Controller
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
        $banner = Banners::all();
        return view('admin.banner.list', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objects = Objects::all();
        return view('admin.banner.create', compact('objects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $banner = Banners::where('position', request('position'))->update(['position' => "0"]);
        $banner = new Banners();
        $banner->link = request('name');
        $banner->position = request('position');
        $banner->id_objects = request('id_objects');
        $banner->position = request('position');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/banner/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/banner", $image);
            $banner->image = $image;
        }
        $banner->user_created = Auth::user()->username;
        $banner->save();
        return redirect()->route('banner.create')->with('success', "Banner created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banners::withTrashed()->findOrFail($id);
        return view('admin.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banners::withTrashed()->findOrFail($id);
        $objects = Objects::all();
        return view('admin.banner.edit', compact('banner', 'objects'));
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
        $banner = Banners::where('position', request('position'))->update(['position' => "0"]);

        $banner = Banners::withTrashed()->findOrFail($id);
        $banner->link = request('name');
        $banner->position = request('position');
        $banner->id_objects = request('id_objects');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/banner/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/banner", $image);
            if (!empty($banner->image)) {
                unlink("img/banner/" . $banner->image);
            }
            $banner->image = $image;
        }
        $banner->user_updated = Auth::user()->username;
        $banner->save();

        return redirect()->route('banner.edit', $banner->id)->with('success', "Banner updated!");
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
        $banner = Banners::findOrFail($id);
        Banners::find($id)->update(['user_deleted' => Auth::user()->username]);
        $banner->delete();

        return redirect()->route('banner.index')->with('delete', "Banner moved to trash!");
    }

    public function trashed(Request $request)
    {
        $banner = Banners::onlyTrashed()->get();
        return view('admin.banner.trash', compact('banner'));
    }

    public function restore($id)
    {
        $banner = Banners::onlyTrashed()->findOrFail($id);
        $banner->restore();

        return redirect()->route('banner.trash')->with('success', "Banner restored!");
    }

    public function restoreAll()
    {
        $banner = Banners::onlyTrashed()->get();
        if (count($banner) == 0) {
            return redirect()->route('banner.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Banners::onlyTrashed()->restore();
            return redirect()->route('banner.trash')->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $banner = Banners::onlyTrashed()->findOrFail($id);
        if (!empty($banner->image)) {
            unlink("img/banner/" . $banner->image);
        }
        $banner->forceDelete();
        return redirect()->route('banner.trash')->with('delete', "Banner $banner->name destroyed!");
    }

    public function deleteAll()
    {
        $banner = Banners::onlyTrashed()->get();

        foreach ($banner as $value) {
            if (!empty($value->image)) {
                unlink("img/banner/" . $value->image);
            }
        }
        if (count($banner) == 0) {
            return redirect()->route('banner.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            Banners::onlyTrashed()->forceDelete();
            return redirect()->route('banner.trash')->with('delete', "All data destroyed!");
        }
    }
}