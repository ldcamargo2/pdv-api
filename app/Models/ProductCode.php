<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCode extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'product_id', 
        'code'
    ];
}