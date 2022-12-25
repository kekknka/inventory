<?php

namespace App\Models;

use App\Models\Sell;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operation extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'product_id',
        'sell_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function sell(){
        return $this->belongsTo(Sell::class);
    }
}
