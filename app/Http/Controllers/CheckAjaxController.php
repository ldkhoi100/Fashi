<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CheckAjaxController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = request('email');
        if (empty($email)) {
            return response()->json(array("empty" => true));
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(array("filter" => true));
        }
        $isExists = User::where('email', $email)->first();
        if ($isExists == true) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function checkUsername(Request $request)
    {
        $username = request('username');
        if (empty($username)) {
            return response()->json(array("empty" => true));
        } elseif (!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
            return response()->json(array("filter" => true));
        }
        $isExists = User::where('username', $username)->first();
        if ($isExists == true) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function checkFullname(Request $request)
    {
        $name = request('name');
        if (empty($name)) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function checkAddress(Request $request)
    {
        $address = request('address');
        if (empty($address)) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function checkPhone(Request $request)
    {
        $phone = request('phone');
        if (empty($phone)) {
            return response()->json(array("empty" => true));
        } elseif (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT) || strlen($phone) > 12) {
            return response()->json(array("filter" => true));
        }
        $isExists = User::where('phone', $phone)->first();
        if ($isExists == true) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function checkPassword(Request $request)
    {
        $password = request('password');
        if (empty($password)) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function checkOldPassword(Request $request)
    {
        $password = request('password');
        $password_confirm = request('password_confirmation');
        if ($password_confirm != $password) {
            return response()->json(array("filter" => true));
        } elseif (empty($password_confirm)) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function loginUsername(Request $request)
    {
        $username = request('username');
        if (empty($username)) {
            return response()->json(array("empty" => true));
        }

        $isExists = User::where('username', $username)->orWhere('email', $username)->first();
        if ($isExists == true) {
            return response()->json(array("exists" => false));
        } else {
            return response()->json(array("exists" => true));
        }
    }
}