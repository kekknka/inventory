<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function home(){
        //dd(Session('user')['token']);
        //Session()->forget('user');
        return view('app.orders.main');
    }
}
