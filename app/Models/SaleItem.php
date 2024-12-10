<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $table = 'sale_items';
    
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'sale_id', 
        'product_id',
        'unit_value',
        'quantity',
        'total',
        'canceled'
    ];
}