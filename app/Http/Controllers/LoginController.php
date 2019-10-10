<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function validateLogin(Request $request)
    {
        $checkUser = Users::where('user_name', $request->user_name)->first();
        if (!empty($checkUser)) {
            if ($checkUser->user_role == 'admin') {
                Auth::loginUsingId($checkUser->id);
                return redirect('/admin');
            } else {
                Auth::loginUsingId($checkUser->id);
                return redirect('/user');
            }
        } else {
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
