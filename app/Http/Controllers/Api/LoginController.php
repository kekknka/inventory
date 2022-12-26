<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validateLogin($request);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'Success',
                'code' => '128'
            ]);
        }

        return response()->json([
                   'message' => 'Invalid credentials',
                   'code' => '124'
        ], 401);
    }

    public function validateLogin(Request $request){
        return $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
            'name' =>'required'
        ]);
    }
}
