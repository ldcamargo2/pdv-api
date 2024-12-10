<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'fantasy_name',
        'company_name',
        'cnpj',
        'email',
        'telphone',
        'cep',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'country',
    ];
}