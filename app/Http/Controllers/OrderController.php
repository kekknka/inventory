<?php

namespace App\Http\Controllers;

use datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class OrderController extends Controller
{

    public $api_site;

    public function __construct(){
        $this->api_site = config('app.api_site');
    }

    public function orders(Request $request){

        !$request->page ? $ext = "/api/v1/orders" : $ext = "/api/v1/orders?page=" . $request->page;
        $response = Http::withToken(Session('user')['token'])->get($this->api_site . $ext);
        $data = json_decode($response->body());

        return $data;
    }

    public function ordersProduct(Request $request){

        !$request->product ? $ext = "/api/v1/orders" : $ext = "/api/v1/orders/" . $request->product;
        $response = Http::withToken(Session('user')['token'])->get($this->api_site . $ext);
        $data = json_decode($response->body());

        return $data;
    }

    public function saveOrder(Request $request){
        if($request->quantity == null){
            Alert::warning('Error en la operacion', 'No se agregaron productos');
            return redirect()->back();
        }

        $order = [
            'subtotal'          => $request->subtotal,
            'discount'          => $request->discount,
            'total'             => $request->total,
            'user_id'           => Session('user')['id']
        ];

        $type = $request->operation_type;
        $operations = array();
        foreach ($request->quantity as $key => $value) {
            array_push($operations, [
                'quantity' => $value,
                'product_id' => $request->id_product[$key],
                'order_id' => $request->id_product[$key],
                'operation_type_id' => $type
            ]);
        }

        $data = [
            'order' => $order,
            'operations' => $operations
        ];

        $response = Http::withToken(Session('user')['token'])->post($this->api_site . '/api/v1/orders', $data);
        $data = json_decode($response->body());


        Alert::success('Operacion exitosa', 'La operacion se realizo de manera exitosa');
        return redirect()->route('dashboard');
    }
}
