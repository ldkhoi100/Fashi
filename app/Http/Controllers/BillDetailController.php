<?php

namespace App\Http\Controllers;

use App\Bill_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill_detail::findOrFail($id);
        Bill_detail::find($id)->update(['user_deleted' => Auth::user()->username]);
        $bill->delete();

        return redirect()->route('bills.details', $bill->id_bill)->with('delete', "Bills $bill->id moved to trash!");
    }

    public function trashed(Request $request, $id)
    {
        $bills = Bill_detail::onlyTrashed()->get();
        return view('admin.bills.trashBillDetail', compact('bills'));
    }

    public function restore($id)
    {
        $bill = Bills::onlyTrashed()->findOrFail($id);
        $bill->restore();

        return redirect()->route('bills.trash')->with('success', "Bills $bill->id restored!");
    }

    public function restoreAll()
    {
        $bill = Bills::onlyTrashed()->get();
        if (count($bill) == 0) {
            return redirect()->route('bills.trash')->with('success', "Clean trash, nothing to restore!");
        } else {
            Bills::onlyTrashed()->restore();
            return redirect()->route('bills.trash')->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $bill = Bills::onlyTrashed()->findOrFail($id);
        $bill->bill_detail()->forceDelete();
        $bill->forceDelete();
        return redirect()->route('bills.trash')->with('delete', "Bills $bill->id destroyed!");
    }

    public function deleteAll()
    {
        $bill = Bills::onlyTrashed()->get();


        if (count($bill) == 0) {
            return redirect()->route('bills.trash')->with('delete', "Clean trash, nothing to delete!");
        } else {
            foreach ($bill as $item) {
                $item->bill_detail()->forceDelete();
                $item->forceDelete();
            }
            return redirect()->route('bills.trash')->with('delete', "All data destroyed!");
        }
    }
}