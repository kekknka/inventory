<?php

namespace App\Http\Controllers;

use datatables;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders(){
        $request = Request::create('https://inventory.loc.com/api/v1/orders', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.Session('user')['token']);
        $res = app()->handle($request);
        $profile_details = json_decode($res->getContent()); // convert to json object



        //dd($profile_details->data);
        //return response()->json(['profile' =>$profile_details], $res->getStatusCode());
        return response()->json($profile_details);

    }
}
