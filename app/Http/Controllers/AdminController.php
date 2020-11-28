<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    function returnViewLogin()
    {
        if (Auth::guard('admins')->check()) {
            return Redirect::route('admin.dashboard');
        }
        return view('admins.login');
    }

    public function login(Request $request)
    {

        // Validator::make($request->all(), Administrator::$rule_login)->validate();

        $request->validate(Administrator::$rule_login);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Authentication passed...
            return Redirect::route('admin.dashboard');
        }

        return Redirect::route('admin.login')->withErrors(['logout' => 'Đăng nhập k thành công!!'])->withInput(['email' => $request->email]);
    }

    function logout()
    {
        if (Auth::guard('admins')->check()) {
            Auth::guard('admins')->logout();
            return Redirect::route('admin.login')->with('success', 'Đăng xuất thành công!!');
        }
        return redirect()->route('home')->withErrors(['logout' => 'Đăng xuất k thành công!!']);
    }

    function dashboard()
    {
        return view('admins.dashboard');
    }
}
