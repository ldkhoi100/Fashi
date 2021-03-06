<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Crypt;
use Str;

use App\User;
use Illuminate\Support\Str as IlluminateStr;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.changePassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect()->back()->with('success', 'Success, Password has changed');
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('auth.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = request('name');
        $user->address = request('address');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/user/" . $image)) {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/user", $image);
            if (!empty($user->image)) {
                unlink("img/user/" . $user->image);
            }
            $user->image = $image;
        }
        $user->save();
        return redirect()->back()->with('success', 'Success, Details has changed');
    }

    public function getEmailVerify()
    {
        $user = User::findOrFail(Auth::user()->id);
        if (empty($user->provider_id)) {
            return view('auth.email', compact('user'));
        } else {
            return back()->with('toast_error', 'You don\'t need change your email !');
        }
    }

    public function postEmailVerify(Request $request, User $user)
    {
        $this->validate($request, [
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore(Auth::user()->id), 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z\-]+\.)+[a-z]{2,6}$/ix', 'max:99']
        ]);
        $user = User::findOrFail(Auth::user()->id);
        if ($user->email != request('email') && empty($user->provider_id)) {
            $user->email = request('email');
            $user->email_verified_at = null;
            $user->save();
        }
        return redirect()->route('details')->with('success', 'Success, Your email has changed');
    }

    public function getUpdatePhone()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('auth.Phone', compact('user'));
    }

    public function postUpdatePhone(Request $request, User $user)
    {
        $this->validate($request, [
            'phone' => ['required', 'numeric', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9', \Illuminate\Validation\Rule::unique('users')->ignore(Auth::user()->id)]
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->phone = request('phone');
        $user->save();
        return redirect()->route('details')->with('success', 'Success, Your phone has changed');
    }

    public function postChangeAddress(Request $request)
    {
        $this->validate($request, [
            'address' => 'required | string | min:5 | max:255'
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->address = request('address');
        $user->save();
        return redirect()->back()->with('toast', 'Change address success');
    }
}