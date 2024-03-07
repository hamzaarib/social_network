<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('login.show');
    }
    public function login(Request $request){
        $login = $request->login;
        $password = $request->password;
        $credentials = ['email' => $login, 'password' => $password];
        if(Auth::attempt($credentials)){
            // Connect
            $request->session()->regenerate();
            return to_route('homepage')->with('success',"Connect Success");
        }else{
            // not Connect
            return back()->withErrors([
                'login' => "Email Or Password Is Not Correct"
            ])->onlyInput('login');
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login')->with('success','you are logout');
    }
}
