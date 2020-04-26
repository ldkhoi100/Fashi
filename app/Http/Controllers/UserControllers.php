<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Role_User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class UserControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
        $this->middleware('role:ROLE_SUPERADMIN');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
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
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('users', 'roles'));
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['numeric', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9', \Illuminate\Validation\Rule::unique('users')->ignore($id)],
            'address' => ['required', 'string', 'max:255'],
        ]);
        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->save();

        $user->roles()->sync(request('role'));

        return back()->with('success', "User $user->username update success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->messenge2()->forceDelete();
        $user->delete();
        return back()->with('success', "User $user->username deleted forever !");
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->block = !$user->block;
        $user->save();
        return back()->with('success', "User $user->username change column block");
    }
}