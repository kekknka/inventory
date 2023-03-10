<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public $api_site;

    public function __construct(){
        $this->api_site = config('app.api_site');
    }

    public function login(Request $request){

        $response = Http::post($this->api_site . 'api/login', [
            'email' => $request->email,
            'password' => $request->password,
            'name' => 'Alvera Eichmann'
        ]);
        $data = json_decode($response->body());

        if($data->code == "128"){
            Session(['user' => [
                'token' => $data->token,
                'id' => $data->id,
                'username' => $data->username,
            ]]);
            return redirect()->route('dashboard');
        }

        return redirect()->back();


    }

    public function logout(){
        Session()->forget('user');
        return redirect()->route('login');
    }
}
