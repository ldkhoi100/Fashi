<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Requests\categoriesRequest;
use App\Categories;
use App\Objects;
use App\Size;
use App\Products;

class CategoriesController extends Controller
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
        $categories = Categories::where('id_objects', '<>', 5)->get();
        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objects = Objects::where('id', '<>', 5)->get();
        return view('admin.categories.create', compact('objects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $categories = new Categories();
        $categories->name = request('name');
        $categories->description = request('description');
        $categories->id_objects = request('id_objects');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/categories/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/categories", $image);
            $categories->image = $image;
        }
        $categories->user_created = Auth::user()->username;
        $categories->save();
        return redirect()->route('categories.create')->with('success', "Categories $categories->name created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::withTrashed()->findOrFail($id);
        // return view('admin.categories.show', compact('categories'));
        return response()->json(['data' => $categories, 'name' => 'Khôi'], 200); // 200 là mã lỗi
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::withTrashed()->findOrFail($id);
        $objects = Objects::where('id', '<>', 5)->get();
        return view('admin.categories.edit', compact('categories', 'objects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $categories = Categories::withTrashed()->findOrFail($id);

        $categories->name = request('name');
        $categories->description = request('description');
        $categories->id_objects = request('id_objects');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/categories/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/categories", $image);
            if (!empty($categories->image)) {
                unlink("img/categories/" . $categories->image);
            }
            $categories->image = $image;
        }

        $categories->user_updated = Auth::user()->username;
        $categories->save();

        return redirect()->route('categories.edit', $categories->id)->with('success', "Categories $categories->name updated!");
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
        $categories = Categories::findOrFail($id);
        Categories::find($id)->update(['user_deleted' => Auth::user()->username]);

        $categories->products()->delete();
        $categories->delete();

        return redirect()->route('categories.index')->with('delete', "Categories $categories->name moved to trash!");
    }

    public function trashed(Request $request)
    {
        $categories = Categories::onlyTrashed()->get();
        return view('admin.categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        $categories = Categories::onlyTrashed()->findOrFail($id);
        $categories->products()->restore();
        $categories->restore();

        return redirect()->route('categories.trash')->with('success', "Categories $categories->name restored!");
    }

    public function restoreAll()
    {
        $categories = Categories::onlyTrashed()->get();
        if (count($categories) == 0) {
            return redirect()->route('categories.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            foreach ($categories as $category) {
                $category->products()->restore();
            }
            Categories::onlyTrashed()->restore();
            return redirect()->route('categories.trash')->with('success', "All categories and all products of them restored!");
        }
    }

    public function delete($id)
    {
        $categories = Categories::onlyTrashed()->findOrFail($id);
        $products = Products::where('id_categories', $id)->onlyTrashed()->get();

        foreach ($products as $product) {
            $product->size()->detach();
        }

        if (!empty($categories->image)) {
            unlink("img/categories/" . $categories->image);
        }
        foreach ($products as $product) {
            if (!empty($product->image1)) {
                unlink("img/products/" . $product->image1);
            }
            if (!empty($product->image2)) {
                unlink("img/products/" . $product->image2);
            }
            if (!empty($product->image3)) {
                unlink("img/products/" . $product->image3);
            }
            if (!empty($product->image4)) {
                unlink("img/products/" . $product->image4);
            }
        }

        $categories->products()->forceDelete();
        $categories->forceDelete();
        return redirect()->route('categories.trash')->with('delete', "categories $categories->name and all products of this categories destroyed!");
    }

    public function deleteAll()
    {
        $categories = Categories::onlyTrashed()->get();

        foreach ($categories as $value) {
            if (!empty($value->image)) {
                unlink("img/categories/" . $value->image);
            }
        }

        if (count($categories) == 0) {
            return redirect()->route('categories.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            foreach ($categories as $category) {
                if (!empty($category->products()->image1)) {
                    unlink("img/products/" . $category->products()->image1);
                }
                if (!empty($category->products()->image2)) {
                    unlink("img/products/" . $category->products()->image2);
                }
                if (!empty($category->products()->image3)) {
                    unlink("img/products/" . $category->products()->image3);
                }
                if (!empty($category->products()->image4)) {
                    unlink("img/products/" . $category->products()->image4);
                }
                $category->products()->forceDelete();
            }
            Categories::onlyTrashed()->forceDelete();
            return redirect()->route('categories.trash')->with('delete', "All data destroyed!");
        }
    }
}