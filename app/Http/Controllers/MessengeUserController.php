<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\User;
use App\MessengeUser;

class MessengeUserController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('username', '<>', Auth::user()->username)->orderBy('created_at', 'DESC')->get();
        return view('admin.messenger.create', compact('user'));
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
            'user' => 'required | numeric',
            'title' => 'required | string | min: 5 | max: 255',
            'description' => 'required | string | min: 10 | max: 999',
        ]);

        $messenger = new MessengeUser();
        $messenger->from_user = Auth::user()->id;
        $messenger->to_user = request('user');
        $messenger->title = request('title');
        $messenger->message = request('description');
        $messenger->save();

        return redirect()->back()->with('success', "$messenger->title sent!");
    }

    public function reply(Request $request)
    {
        $this->validate($request, [
            'username' => 'required | numeric',
            'title' => 'required | string | min: 1 | max: 255',
            'description' => 'required | string | min: 10 | max: 999',
        ]);

        $name_username = request('name_username');
        $messenger = new MessengeUser();
        $messenger->from_user = Auth::user()->id;
        $messenger->to_user = request('username');
        if (substr(request('title'), 0, 6) == "RE:RE:") {
            $messenger->title = substr(request('title'), 3);
        } else {
            $messenger->title = request('title');
        }
        $messenger->message = request('description');
        $messenger->save();

        return redirect()->back()->with('success', "Replied to user $name_username!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $messenger = MessengeUser::withTrashed()->findOrFail($id);
        $messenger->reader = 1;
        $messenger->save();
        return view('admin.messenger.show', compact('messenger'));
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
        //
    }

    public function inbox(Request $request)
    {
        $inbox = MessengeUser::withTrashed()->orderBy('created_at', 'DESC')->where('from_user', '<>', Auth::user()->id)->where('remove', 0)->paginate(20);
        return view('admin.messenger.inbox', compact('inbox'));
    }

    public function message_sent(Request $request)
    {
        $inbox = MessengeUser::orderBy('created_at', 'DESC')->where('from_user', Auth::user()->id)->paginate(20);
        return view('admin.messenger.sent', compact('inbox'));
    }

    public function mark_read($id)
    {
        $id = Crypt::decrypt($id);
        $mark_read = MessengeUser::findOrFail($id);
        $mark_read->reader = 1;
        $mark_read->save();
        return back();
    }

    public function mark_all_read()
    {
        $mark_read = MessengeUser::all();
        foreach ($mark_read as $mark) {
            $find = MessengeUser::findOrFail($mark->id);
            $find->reader = 1;
            $find->save();
        }
        return back();
    }

    public function mark_unread($id)
    {
        $id = Crypt::decrypt($id);
        $mark_read = MessengeUser::findOrFail($id);
        $mark_read->reader = 0;
        $mark_read->save();
        return back();
    }

    public function delete_message($id)
    {
        $id = Crypt::decrypt($id);
        $mark_read = MessengeUser::findOrFail($id);
        $mark_read->delete();
        return back();
    }

    public function remove_message($id)
    {
        $id = Crypt::decrypt($id);
        $mark_read = MessengeUser::withTrashed()->findOrFail($id);
        $mark_read->remove = 1;
        $mark_read->save();
        return back();
    }
}