<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Requests\ImageRequest;
use App\Instagrams;

class InstagramsController extends Controller
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
        $instagram = Instagrams::all();
        return view('admin.instagram.list', compact('instagram'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instagram.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $instagram = new Instagrams();
        $instagram->name = request('name');
        $instagram->link = request('link');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/instagram/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/instagram", $image);
            $instagram->image = $image;
        }
        $instagram->user_created = Auth::user()->username;
        $instagram->save();
        return redirect()->route('instagram.create')->with('success', "Instagram created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instagram = Instagrams::withTrashed()->findOrFail($id);
        return view('admin.instagram.show', compact('instagram'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instagram = Instagrams::withTrashed()->findOrFail($id);
        return view('admin.instagram.edit', compact('instagram'));
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
        $instagram = Instagrams::withTrashed()->findOrFail($id);

        $instagram->name = request('name');
        $instagram->link = request('link');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/instagram/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/instagram", $image);
            if (!empty($instagram->image)) {
                unlink("img/instagram/" . $instagram->image);
            }
            $instagram->image = $image;
        }

        $instagram->user_updated = Auth::user()->username;
        $instagram->save();

        return redirect()->route('instagram.edit', $instagram->id)->with('success', "Instagram updated!");
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
        $instagram = Instagrams::findOrFail($id);
        Instagrams::find($id)->update(['user_deleted' => Auth::user()->username]);
        $instagram->delete();

        return redirect()->route('instagram.index')->with('delete', "Instagram moved to trash!");
    }

    public function trashed(Request $request)
    {
        $instagram = Instagrams::onlyTrashed()->get();
        return view('admin.instagram.trash', compact('instagram'));
    }

    public function restore($id)
    {
        $instagram = Instagrams::onlyTrashed()->findOrFail($id);
        $instagram->restore();

        return redirect()->route('instagram.trash')->with('success', "Instagram restored!");
    }

    public function restoreAll()
    {
        $instagram = Instagrams::onlyTrashed()->get();
        if (count($instagram) == 0) {
            return redirect()->route('instagram.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Instagrams::onlyTrashed()->restore();
            return redirect()->route('instagram.trash')->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $instagram = Instagrams::onlyTrashed()->findOrFail($id);
        if (!empty($instagram->image)) {
            unlink("img/instagram/" . $instagram->image);
        }
        $instagram->forceDelete();
        return redirect()->route('instagram.trash')->with('delete', "instagram $instagram->name destroyed!");
    }

    public function deleteAll()
    {
        $instagram = Instagrams::onlyTrashed()->get();

        foreach ($instagram as $value) {
            if (!empty($value->image)) {
                unlink("img/instagram/" . $value->image);
            }
        }
        if (count($instagram) == 0) {
            return redirect()->route('instagram.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            Instagrams::onlyTrashed()->forceDelete();
            return redirect()->route('instagram.trash')->with('delete', "All data destroyed!");
        }
    }
}