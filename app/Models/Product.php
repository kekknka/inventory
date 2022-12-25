<?php

namespace App\Models;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, PowerJoins;
    protected $fillable = [
        'SKU',
        'name',
        'description',
        'inventory_min',
        'price_in',
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
