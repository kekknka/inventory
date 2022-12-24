<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'SKU',
        'name',
        'description',
        'inventory_min',
        'price_int',
        'price_out',
        'unit',
        'presentation',
        'active',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
