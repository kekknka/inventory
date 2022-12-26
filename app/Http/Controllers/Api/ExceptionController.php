<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExceptionController extends Controller
{
    public function not_access_token(){
        return response()->json([
           'message' => 'Access token not found'
        ]);
    }
}
