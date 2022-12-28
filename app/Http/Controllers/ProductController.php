<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public $api_site;

    public function __construct(){
        $this->api_site = config('app.api_site');
    }


    public function products(){

        $response = Http::withToken(Session('user')['token'])->get($this->api_site . 'api/v1/products?paginate=false');
        $data = json_decode($response->body());

        return $data;
    }
}
