<?php

namespace App\Models;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, PowerJoins, SoftDeletes;
    protected $fillable = [
        'SKU',
        'name',
        'description',
        'inventory_min',
        'price_in',
        'price_out',
        'unit',
        'presentation',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
