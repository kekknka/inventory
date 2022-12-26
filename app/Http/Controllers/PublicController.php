<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        return view('home');
    }

    public function login(){
        if(Session()->has('user') == true){
            return redirect()->route('dashboard');
        }else{
            return view('auth.login');
        }
    }
}
