<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use App\Models\Product;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result = Product::selectRAW('
        orders.created_at AS "date",
        products.id AS product_id,
        products.`name` AS product,
        products.SKU AS sku,
        orders.id AS order_id,
        operations.id AS operation,
        IFNULL((SELECT SUM(operations.quantity) FROM operations WHERE operations.id <= operation AND operations.operation_type_id = 1 AND product_id = products.id), 0.00) AS total_in,
        IFNULL((SELECT SUM(operations.quantity) FROM operations WHERE operations.id <= operation AND operations.operation_type_id = 2 AND product_id = products.id), 0.00) AS total_out,
        operations.quantity AS quantity,
        IFNULL((SELECT SUM(operations.quantity) FROM operations WHERE operations.id <= operation AND operations.operation_type_id = 1 AND product_id = products.id), 0.00) - IFNULL((SELECT SUM(operations.quantity) FROM operations WHERE operations.id <= operation AND operations.operation_type_id = 2 AND product_id = products.id), 0.00) AS stock,
        operation_types.type AS type_operation')
        ->join('operations', 'operations.product_id', '=', 'products.id')
        ->join('orders', 'orders.id', '=', 'operations.order_id')
        ->join('operation_types', 'operation_types.id', '=' ,'operations.operation_type_id')
        ->groupBy('operations.id')
        ->orderBy('operations.id', 'DESC')
        ->paginate();

        return OrderResource::collection($result);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        DB::beginTransaction(); // Iniciamos transaccion
        try {
            $order = $request->order;
            $operations = $request->operations;
            $order_id = Order::create($order)->id;
            $op = array();
            foreach ($operations as $key => $value) {
                array_push($op, [
                    'quantity' => $value['quantity'],
                    'product_id' => $value['product_id'],
                    'order_id' => $order_id,
                    'operation_type_id' => $value['operation_type_id']
                ]);
            }
            Operation::insert($op);
            DB::commit(); // Cerramos la transaccion
            return response()->json([
                'message' => 'Transaction successfully'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack(); // Si errors en transaccion deshaser
            $code = $th->getCode();
            if($code == 'HY000'){
                return response()->json([
                    'message' => 'Structure parameters are invalid'
                ]);
            }
            return response()->json([
                'message' => $th->getMessage(),
            ]);
        }


        /*foreach ($operations as $key => $value) {
            array_push($value, array('order_id' => 2));
            dd($value);
        }*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        $result = Product::selectRAW('
        orders.created_at AS "date",
        products.id AS product_id,
        products.`name` AS product,
        products.SKU AS sku,
        orders.id AS order_id,
        operations.id AS operation,
        IFNULL((SELECT SUM(operations.quantity) FROM operations WHERE operations.id <= operation AND operations.operation_type_id = 1 AND product_id = products.id), 0.00) AS total_in,
        IFNULL((SELECT SUM(operations.quantity) FROM operations WHERE operations.id <= operation AND operations.operation_type_id = 2 AND product_id = products.id), 0.00) AS total_out,
        operations.quantity AS quantity,
        IFNULL((SELECT SUM(operations.quantity) FROM operations WHERE operations.id <= operation AND operations.operation_type_id = 1 AND product_id = products.id), 0.00) - IFNULL((SELECT SUM(operations.quantity) FROM operations WHERE operations.id <= operation AND operations.operation_type_id = 2 AND product_id = products.id), 0.00) AS stock,
        operation_types.type AS type_operation')
        ->join('operations', 'operations.product_id', '=', 'products.id')
        ->join('orders', 'orders.id', '=', 'operations.order_id')
        ->join('operation_types', 'operation_types.id', '=' ,'operations.operation_type_id')
        ->where('products.SKU', $item)
        ->orWhere('products.name', $item)
        ->groupBy('operations.id')
        ->orderBy('operations.id', 'DESC')
        ->get()
        ->toArray();

        return response()->json($result);
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
}
