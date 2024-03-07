<?php

namespace App\Http\Controllers;

use App\Mail\ProfileEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(Request $request){
        $compteur = $request->session()->increment('compteur');
        return view('home',compact('compteur'));
    }
}
