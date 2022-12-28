<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $api_site;

    public function __construct(){
        $this->api_site = config('app.api_site');
    }


    public function products(){

        $request = Request::create($this->api_site . '/api/v1/products?paginate=false', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.Session('user')['token']);
        $res = app()->handle($request);
        $profile_details = json_decode($res->getContent()); // convert to json object

        return response()->json($profile_details);
    }
}
