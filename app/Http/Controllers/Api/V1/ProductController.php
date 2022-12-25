<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\V1\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::select('products.*', 'users.name AS user_name')
            ->joinRelationship('user')
            ->latest()
            ->paginate();

        return ProductResource::collection($products);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $this->validateRequest($request);

        if($validated->fails()){
            return response()->json([
                'message' => 'DataForm invalidated'
            ]);
        }

        $product = Product::create($request->all());

        return new ProductResource($product);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $products = Product::select('products.*', 'users.name AS user_name')
                ->joinRelationship('user')
                ->findOrFail($id);
                return new ProductResource($products);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Data not found, record no exist'
            ], 401);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validateRequest(Request $request){
        return Validator::make($request->all(), [
            'SKU'           => 'required|max:14',
            'name'          => 'required',
            'description'   => 'required',
            'inventory_min' => 'required',
            'price_in'     => 'required',
            'price_out'     => 'required',
            'unit'          => 'required',
            'presentation'  => 'required',
            'active'        => 'required',
            'user_id'       => 'required'
        ]);
        //return $request->validate();
    }
}
