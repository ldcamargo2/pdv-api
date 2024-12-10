<?php

namespace App\Http\Requests;

use LaravelAux\BaseRequest;

class ProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required',
            'stock' => 'required',
            'company_id' => 'required'
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
            'description' => 'Descrição',
            'company_id' => 'Empresa',
            'stock' => 'Estoque',
        ];
    }
}