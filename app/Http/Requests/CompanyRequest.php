<?php

namespace App\Http\Requests;

use LaravelAux\BaseRequest;

class CompanyRequest extends BaseRequest
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
        ];
    }
}