<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthenticatorController extends Controller
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

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "registration details are not valid");
        }
        return redirect(route('login'))->with("success", "Registration success");

    }

    function registration(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));

    }
}
