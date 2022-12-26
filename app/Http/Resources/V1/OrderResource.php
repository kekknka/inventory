<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'date' => $this->date,
            'product_id' => $this->product_id,
            'product' => $this->product,
            'sku' => $this->sku,
            'order_id' => $this->order_id,
            'operation' => $this->operation,
            'total_in' => $this->total_in,
            'total_out' => $this->total_out,
            'quantity' => $this->quantity,
            'stock' => $this->stock,
            'type_operation' => $this->type_operation

        ];
    }
}
