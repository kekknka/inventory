<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'operation_type',
        'subtotal',
        'discount',
        'total',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function operation_type(){
        return $this->belongsTo(Operation_type::class);
    }
}
