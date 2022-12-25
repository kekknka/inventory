<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'SKU' => $this->SKU,
            'name' => $this->name,
            'description' => $this->description,
            'inventory_min' => $this->inventory_min,
            'price_in' => $this->price_in,
            'price_out' => $this->price_out,
            'unit' => $this->unit,
            'presentation' => $this->presentation,
            'user_name' => $this->user_name,
            'active' => $this->active,
        ];
    }
}
