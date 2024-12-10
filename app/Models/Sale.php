<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'total',
        'total_to_pay',
        'client_id',
        'status',
        'discount',
        'pending',
        'cpf',
        'send_nf'
    ];
}