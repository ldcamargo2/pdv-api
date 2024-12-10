<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'customer_type',
        'name',
        'fantasy_name',
        'cpf',
        'cnpj',
        'cep',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'status',
        'limit',
        'credit_status',
    ];
}