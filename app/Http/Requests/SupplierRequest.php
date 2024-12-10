<?php

namespace App\Http\Requests;

use LaravelAux\BaseRequest;

class SupplierRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fantasy_name' => 'required',
            'company_name' => 'required',
            'cnpj' => 'required',
            'email' => 'required',
            'telphone' => 'required',
        ];
    }

    /**
     * Validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute é obrigatório',
        ];
    }

    /**
     * Attributes Name
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'fantasy_name' => 'Nome Fantasia',
            'company_name' => 'Razão Social',
            'cnpj' => 'CNPJ',
            'email' => 'E-mail',
            'telphone' => 'Telefone/Celular',
        ];
    }
}