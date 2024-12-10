<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'fantasy_name',
        'company_name',
        'cnpj',
        'cep',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'country',
        'omie_token',
        'omie_secret',
        'color',
        'font_color',
    ];
}