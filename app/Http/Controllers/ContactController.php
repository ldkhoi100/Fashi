<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\ReplyMail;

use App\Contact;

class ContactController extends Controller
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
        $contact = Contact::all();
        return view('admin.contact.list', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
        $contact = Contact::findOrFail($id);
        return view('admin.contact.reply', compact('contact'));
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
            'message' => 'required | string | min:5'
        ]);
        $contact = Contact::findOrFail($id);
        Mail::to($contact->email)->send(new ReplyMail($contact, request('message')));
        return back()->with('success', "Reply mail to $contact->email success");
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
        $contact = Contact::findOrFail($id);
        Contact::find($id)->update(['user_deleted' => Auth::user()->username]);
        $contact->delete();
        return back()->with('delete', "contact of $contact->name moved to trash!");
    }

    public function trashed(Request $request)
    {
        $contact = Contact::onlyTrashed()->get();
        return view('admin.contact.trash', compact('contact'));
    }

    public function restore($id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->restore();
        return back()->with('success', "contact of $contact->name restored!");
    }

    public function restoreAll()
    {
        $contact = Contact::onlyTrashed()->get();
        if (count($contact) == 0) {
            return back()->with('success', "Clean trash, nothing to restore!");
        } else {
            Contact::onlyTrashed()->restore();
            return back()->with('success', "All data restored!");
        }
    }

    public function delete($id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->forceDelete();
        return back()->with('delete', "contact of $contact->name destroyed!");
    }

    public function deleteAll()
    {
        $contact = Contact::onlyTrashed()->get();
        if (count($contact) == 0) {
            return back()->with('delete', "Clean trash, nothing to delete!");
        } else {
            Contact::onlyTrashed()->forceDelete();
            return back()->with('delete', "All data destroyed!");
        }
    }
}