<?php

namespace App\Models;

use App\Models\User;
use App\Models\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sell extends Model
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
