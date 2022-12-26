<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function login(Request $request){

        $response = Http::post('http://inventory.loc.com/api/login', [
            'email' => $request->email,
            'password' => $request->password,
            'name' => 'Alvera Eichmann'
        ]);
        $data = json_decode($response->body());

        if($data->code == "128"){
            Session(['user' => [
                'token' => $data->token
            ]]);
            return redirect()->route('dashboard');
        }

        return redirect()->back();


    }
}
