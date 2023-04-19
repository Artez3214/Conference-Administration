<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect(route('conferences'));
        }
        return view('login');
    }
    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('conferences'));
        }
        return redirect(route('login'))->with("error", "login details are not valid");
    }


    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));

    }
}
