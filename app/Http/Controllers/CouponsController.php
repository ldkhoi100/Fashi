<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use App\Coupons;

class CouponsController extends Controller
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
        $coupons = Coupons::orderBy('created_at', 'DESC')->get();
        return view('admin.coupons.list', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($number, $percent, Request $request)
    {
        if ($request->ajax()) {
            if (!is_numeric($number) || $number < 1) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'The number you entered is incorrect !'
                ]);
            }
            if (!is_numeric($percent) || $percent < 1 || $percent > 100) {
                return response()->json([
                    'status' => 'percent',
                    'msg2' => 'The discount percentage must be beetween 1 and 100 !'
                ]);
            }
        }
        $coupon = Coupons::withTrashed()->get();
        if ($number > 0) {
            for ($i = 0; $i < $number; $i++) {
                $coupons = new Coupons();
                $random = "FS" . rand(1000000000, 9999999999);
                foreach ($coupon as $item) {
                    while ($item->id_coupon == $random) {
                        $random = "FS" . rand(1000000000, 9999999999);
                    }
                }
                $coupons->id_coupon = $random;
                $coupons->discount = $percent;
                $coupons->user_created = Auth::user()->username;
                $coupons->save();
            }
        }
        $coupons = Coupons::orderBy('created_at', 'DESC')->get();
        return view('admin.coupons.ajaxUsed', compact('coupons'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupons = Coupons::withTrashed()->findOrFail($id);
        return view('admin.coupons.edit', compact('coupons'));
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
        $coupons = Coupons::withTrashed()->findOrFail($id);
        $coupons->id_coupon = request('id_coupon');
        $coupons->discount = request('discount');
        $coupons->used = request('used');
        $coupons->user_updated = Auth::user()->username;
        $coupons->save();
        return back()->with('success', "Coupons $coupons->id_coupon updated!");
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
        $coupons = Coupons::findOrFail($id);
        Coupons::find($id)->update(['user_deleted' => Auth::user()->username]);
        $coupons->delete();
        return back()->with('delete', "Coupons $coupons->id_coupon moved to trash!");
    }

    public function trashed(Request $request)
    {
        $coupons = Coupons::onlyTrashed()->get();
        return view('admin.coupons.trash', compact('coupons'));
    }

    public function restore($id)
    {
        $coupons = Coupons::onlyTrashed()->findOrFail($id);
        $coupons->restore();

        return back()->with('success', "Coupons $coupons->id_coupon restored!");
    }

    public function restoreAll()
    {
        $coupons = Coupons::onlyTrashed()->get();
        if (count($coupons) == 0) {
            return back()->with('success', "Clean trash, nothing to restore!");
        } else {
            Coupons::onlyTrashed()->restore();
            return back()->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $coupons = Coupons::onlyTrashed()->findOrFail($id);
        $coupons->forceDelete();
        return back()->with('delete', "admin.coupons $coupons->id_coupon destroyed!");
    }

    public function deleteAll()
    {
        $coupons = Coupons::onlyTrashed()->get();
        if (count($coupons) == 0) {
            return back()->with('delete', "Clean trash, nothing to delete!");
        } else {
            Coupons::onlyTrashed()->forceDelete();
            return back()->with('delete', "All data destroyed!");
        }
    }

    public function used($id)
    {
        $coupons_id = Coupons::withTrashed()->findOrFail($id);
        $coupons_id->used = !$coupons_id->used;
        $coupons_id->save();
        $coupons = Coupons::orderBy('created_at', 'DESC')->get();
        return view('admin.coupons.ajaxUsed', compact('coupons'));
    }

    public function usedTrash($id)
    {
        $coupons_id = Coupons::withTrashed()->findOrFail($id);
        $coupons_id->used = !$coupons_id->used;
        $coupons_id->save();
        $coupons = Coupons::onlyTrashed()->get();
        return view('admin.coupons.trashAjaxUsed', compact('coupons'));
    }
}