<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{
    protected $table = 'sale_payments';
    
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'sale_id', 
        'method',
        'value',
    ];
}