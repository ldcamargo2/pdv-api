<?php

namespace App\Http\Requests;

use LaravelAux\BaseRequest;

class UserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

            switch (request()->method()) {
            case 'POST':
            {
                return [
                    'name' => 'required', 
                    'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
                    'password' => [
                        function ($attribute, $value, $fail) { 
                            $password = request()->input('password_confirmacao');
                            if($attribute == ''){
                                $fail('O campo Senha é obrigatório');
                            }
                            if(isset($value)){

                                if(!isset($password)){
                                    $fail('Confirmação de Senha é obrigatório.');
                                } else if($password != $value){
                                    $fail('As senhas informadas não conferem.');
                                }
                                
                            } 
                        },
                    ],
                    'cellphone' => '', 
                    'department_id' => '',  
                    'cpf_cnpj' => 'required', 
                    'access_nivel' => 'required',
                    'status' => 'required',
                    'company_id' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required', 
                    'email' => 'required|unique:users,email,'.request()->id,
                    'password' => [
                        function ($attribute, $value, $fail) { 
                            $password = request()->input('password_confirmacao');
                            if($attribute == ''){
                                $fail('O campo Senha é obrigatório');
                            }
                            if(isset($value)){

                                if(!isset($password)){
                                    $fail('Confirmação de Senha é obrigatório.');
                                } else if($password != $value){
                                    $fail('As senhas informadas não conferem.');
                                }
                                
                            } 
                        },
                    ],
                    'cellphone' => '', 
                    'department_id' => '',  
                    'cpf_cnpj' => 'required', 
                    'access_nivel' => 'required',
                    'status' => 'required',
                    'company_id' => 'required',
                ];
            }
            default:break;
        }    
            
        }
    
    /**
     * Rules Messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.unique' => 'O e-mail: :attribute informado já está sendo utilizado.',
            'confirmed' => 'As senhas informadas não correspondem.',
            'integer' => 'O campo :attribute deve ser um número',
            'mimes' => 'O campo :attribute deve conter uma extensão válida:jpeg, jpg, png, gif',
            'required' => 'O campo :attribute é obrigatório.',
            'date' => 'O campo :attribute não é uma data válida.',
            'min' => 'O campo :attribute requer um mínimo de 6 caracteres.',
            'size' => [
                'string' => 'O :attribute deve ser :size caracteres de tamanho.',
            ],
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
            'name' => 'Nome',
            'email' => 'Email',
            'password' => 'Senha',
            'password_confirmation' => 'Confirme a Senha',
            'department_id' => 'Departamento',
            'cpf_cnpj' => 'CPF|CNPJ',
            'cellphone' => 'Celular',
            'access_nivel' => 'Nível de Acesso',
            'status' => 'Status',
            'company_id' => 'Empresa'
        ];
    }
}
