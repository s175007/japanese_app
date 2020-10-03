<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    function returnViewLogin(){
        return view('admins.login');
    }

    public function login(Request $request){
        
        Validator::make($request->all(),Administrator::$rule_login)->validate();

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Authentication passed...
            return "Đăng nhập thành công!";
        }
    }

    function logout(Request $request){
        if(Auth::guard('admins')->check()){
            Auth::guard('admins')->logout();
            return redirect()->back()->with('success', 'Đăng xuất thành công!!'); 
        }
        return redirect()->route('home')->withErrors(['logout'=>'Đăng xuất k thành công!!']);
    }
}
