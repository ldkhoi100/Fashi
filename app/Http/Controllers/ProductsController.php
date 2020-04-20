<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Requests\ProductsRequest;
use App\Products;
use App\Categories;
use App\Objects;
use App\Reviews;
use App\Size;
use App\Size_products;

class ProductsController extends Controller
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
        $products = Products::all();
        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objects = Objects::where('id', '<>', 5)->get();
        $none = Categories::findOrFail(1);
        $mans = Categories::where('id_objects', 2)->get();
        $womans = Categories::where('id_objects', 3)->get();
        $kids = Categories::where('id_objects', 4)->get();
        $size = Size::all();
        return view('admin.products.create', compact('mans', 'womans', 'kids', 'none', 'objects', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        if (request('promotion_price') > request('unit_price')) {
            return back()->with('delete', "Promotion price must be smaller than unit price!");
        }
        $product = new Products();
        $product->name = request('name');
        $product->id_objects = request('id_objects');
        $product->description = request('description');
        $product->unit_price = request('unit_price');
        $product->highlight = request('highlight');
        $product->new = request('new');
        $product->id_categories = request('id_categories');

        if (request('promotion_price')) {
            $product->promotion_price = request('promotion_price');
        }

        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $name_image1 = $file1->getClientOriginalName();
            $image1 = Str::random(5) . "_" . $name_image1;
            while (file_exists("img/products/" . $image1)) {
                $image1 = Str::random(5) . "_" . $name_image1;
            }
            $file1->move("img/products", $image1);
            $product->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $name_image2 = $file2->getClientOriginalName();
            $image2 = Str::random(5) . "_" . $name_image2;
            while (file_exists("img/products/" . $image2)) {
                $image2 = Str::random(5) . "_" . $name_image2;
            }
            $file2->move("img/products", $image2);
            $product->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $name_image3 = $file3->getClientOriginalName();
            $image3 = Str::random(5) . "_" . $name_image3;
            while (file_exists("img/products/" . $image3)) {
                $image3 = Str::random(5) . "_" . $name_image3;
            }
            $file3->move("img/products", $image3);
            $product->image3 = $image3;
        }

        if ($request->hasFile('image4')) {
            $file4 = $request->file('image4');
            $name_image4 = $file4->getClientOriginalName();
            $image4 = Str::random(5) . "_" . $name_image4;
            while (file_exists("img/products/" . $image4)) {
                $image4 = Str::random(5) . "_" . $name_image4;
            }
            $file4->move("img/products", $image4);
            $product->image4 = $image4;
        }

        $product->user_created = Auth::user()->username;
        $product->save();
        if (request('size')) {
            $product->size()->attach(request('size'));
        }

        return redirect()->route('product.create')->with('success', "Product $product->name created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::withTrashed()->findOrFail($id);
        return response()->json(['data' => $product, 'name' => 'Khôi'], 200); // 200 là mã lỗi
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objects = Objects::where('id', '<>', 5)->get();
        $product = Products::withTrashed()->findOrFail($id);
        $none = Categories::findOrFail(1);
        $mans = Categories::where('id_objects', 2)->get();
        $womans = Categories::where('id_objects', 3)->get();
        $kids = Categories::where('id_objects', 4)->get();
        $sizes = Size::all();
        return view('admin.products.edit', compact('product', 'none', 'mans', 'womans', 'kids', 'objects', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        if (request('promotion_price') > request('unit_price')) {
            return back()->with('delete', "Promotion price must be smaller than unit price!");
        }

        $product = Products::withTrashed()->findOrFail($id);
        $product->name = request('name');
        $product->description = request('description');
        $product->unit_price = request('unit_price');
        $product->highlight = request('highlight');
        $product->new = request('new');
        $product->id_categories = request('id_categories');
        $product->id_objects = request('id_objects');

        if (request('promotion_price')) {
            $product->promotion_price = request('promotion_price');
        }

        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $name_image1 = $file1->getClientOriginalName();
            $image1 = Str::random(5) . "_" . $name_image1;
            while (file_exists("img/products/" . $image1)) {
                $image1 = Str::random(5) . "_" . $name_image1;
            }
            $file1->move("img/products", $image1);
            if (!empty($product->image1)) {
                unlink("img/products/" . $product->image1);
            }
            $product->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $name_image2 = $file2->getClientOriginalName();
            $image2 = Str::random(5) . "_" . $name_image2;
            while (file_exists("img/products/" . $image2)) {
                $image2 = Str::random(5) . "_" . $name_image2;
            }
            $file2->move("img/products", $image2);
            if (!empty($product->image2)) {
                unlink("img/products/" . $product->image2);
            }
            $product->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $name_image3 = $file3->getClientOriginalName();
            $image3 = Str::random(5) . "_" . $name_image3;
            while (file_exists("img/products/" . $image3)) {
                $image3 = Str::random(5) . "_" . $name_image3;
            }
            $file3->move("img/products", $image3);
            if (!empty($product->image3)) {
                unlink("img/products/" . $product->image3);
            }
            $product->image3 = $image3;
        }

        if ($request->hasFile('image4')) {
            $file4 = $request->file('image4');
            $name_image4 = $file4->getClientOriginalName();
            $image4 = Str::random(5) . "_" . $name_image4;
            while (file_exists("img/products/" . $image4)) {
                $image4 = Str::random(5) . "_" . $name_image4;
            }
            $file4->move("img/products", $image4);
            if (!empty($product->image4)) {
                unlink("img/products/" . $product->image4);
            }
            $product->image4 = $image4;
        }

        $product->user_updated = Auth::user()->username;
        $product->save();

        $product->size()->sync(request('size'));

        return redirect()->route('product.edit', $product->id)->with('success', "Product $product->name updated!");
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
        $product = Products::findOrFail($id);
        Products::find($id)->update(['user_deleted' => Auth::user()->username]);
        $product->delete();

        return redirect()->route('product.index')->with('delete', "Product $product->name moved to trash!");
    }

    public function trashed(Request $request)
    {
        $products = Products::onlyTrashed()->get();
        return view('admin.products.trash', compact('products'));
    }

    public function restore($id)
    {
        $product = Products::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('product.trash')->with('success', "Product $product->name restored!");
    }

    public function restoreAll()
    {
        $product = Products::onlyTrashed()->get();
        if (count($product) == 0) {
            return redirect()->route('product.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Products::onlyTrashed()->restore();
            return redirect()->route('product.trash')->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $product = Products::onlyTrashed()->findOrFail($id);
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

        $product->size()->detach();
        $product->forceDelete();
        return redirect()->route('product.trash')->with('delete', "Product $product->name destroyed!");
    }

    public function deleteAll()
    {
        $product = Products::onlyTrashed()->get();

        foreach ($product as $value) {
            if (!empty($value->image1)) {
                unlink("img/products/" . $value->image1);
            }
            if (!empty($value->image2)) {
                unlink("img/products/" . $value->image2);
            }
            if (!empty($value->image3)) {
                unlink("img/products/" . $value->image3);
            }
            if (!empty($value->image4)) {
                unlink("img/products/" . $value->image4);
            }
        }

        if (count($product) == 0) {
            return redirect()->route('product.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            Products::onlyTrashed()->forceDelete();
            return redirect()->route('product.trash')->with('delete', "All data destroyed!");
        }
    }

    public function highlights($id)
    {
        $product = Products::withTrashed()->findOrFail($id);
        $product->highlight = !$product->highlight;
        $product->save();
        $products = Products::all();
        return view('admin.products.ajax.list', compact('products'));
    }

    public function highlightsTrash($id)
    {
        $product = Products::withTrashed()->findOrFail($id);
        $product->highlight = !$product->highlight;
        $product->save();
        $products = Products::onlyTrashed()->get();
        return view('admin.products.ajax.trash', compact('products'));
    }

    public function news($id)
    {
        $product = Products::withTrashed()->findOrFail($id);
        $product->new = !$product->new;
        $product->save();
        $products = Products::all();
        return view('admin.products.ajax.list', compact('products'));
    }

    public function newsTrash($id)
    {
        $product = Products::withTrashed()->findOrFail($id);
        $product->new = !$product->new;
        $product->save();
        $products = Products::onlyTrashed()->get();
        return view('admin.products.ajax.trash', compact('products'));
    }

    public function addQuantity(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required | numeric | min: 0'
        ]);
        $products = Products::findOrFail($id);
        $products->amount += request('amount');
        $products->save();
        return redirect()->back()->with('success', "Product $products->name updated quantity to $products->amount !");
    }

    public function qtySizeGet($id)
    {
        $id_product = Products::withTrashed()->where('id', $id)->first();
        $size_product = Size_products::where('id_products', $id)->get();
        return view('admin.size_product.edit', compact('size_product', 'id_product'));
    }

    public function qtySizePost(Request $request, $id)
    {
        $this->validate($request, [
            'changeqty.*' => 'required | numeric | min: 0'
        ]);
        $size_product = Size_products::where('id_products', $id)->get();
        $i = 0;
        foreach ($size_product as $quantity) {
            $qty = Size_products::findOrFail($quantity->id);
            $qty->quantity = request("changeqty" . $i);
            $qty->save();
            $i++;
        }
        return back()->with('success', 'Change success');
    }
}