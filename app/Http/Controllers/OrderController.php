<?php

namespace App\Http\Controllers;

use datatables;
use RealRashid\SweetAlert\Facades\Alert as Alert;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public $api_site;

    public function __construct(){
        $this->api_site = config('app.api_site');
    }

    public function orders(Request $request){
        if(!$request->page){
            $request = Request::create($this->api_site . '/api/v1/orders', 'GET');
        }else{
            $request = Request::create($this->api_site . '/api/v1/orders?page=' . $request->page, 'GET');
        }
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.Session('user')['token']);
        $res = app()->handle($request);
        $profile_details = json_decode($res->getContent()); // convert to json object

        return response()->json($profile_details);
    }

    public function ordersProduct(Request $request){
        if(!$request->product){
            $request = Request::create($this->api_site . '/api/v1/orders', 'GET');
        }else{
            $request = Request::create($this->api_site . '/api/v1/orders/' . $request->product, 'GET');
        }
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.Session('user')['token']);
        $res = app()->handle($request);
        $profile_details = json_decode($res->getContent()); // convert to json object

        return response()->json($profile_details);
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

        $request = Request::create($this->api_site . '/api/v1/orders', 'POST', $data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.Session('user')['token']);
        $res = app()->handle($request);
        $profile_details = json_decode($res->getContent()); // convert to json object


        Alert::success('Operacion exitosa', 'La operacion se realizo de manera exitosa');
        return redirect()->route('dashboard');
    }
}
