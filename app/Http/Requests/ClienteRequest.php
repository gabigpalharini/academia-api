<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest 
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
    
            return [
                'nome' => 'required|max:80|min:5',
            'email' => 'required|email|unique:cliente_models,email,'.$this->input('email'),
            'celular' => 'required|max:15|min:11',
            'cpf' =>'required|max:11|min:11|unique:cliente_models,cpf,'.$this->input('cpf'),
            'password' => 'required'
            ];
        }
        public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error'=> $validator->errors()
        ]));
    }
    
    public function messages()
    {
        return [
           'name.reqired' => 'O campo nome é obrigatório', 
           'nome.max' => 'o campo nome deve conter no máximo 80 caracteres',
           'nome.min' => 'o campo nome deve conter no mínimo 5 caracteres',
           'cpf.reqired' => 'CPF obrigatório',
           'cpf.max' => 'CPF deve conter no máximo 11 caracteres',
           'cpf.min' => 'CPF deve conter no mínimo 11 caracteres',
           'cpf.unique' => 'CPF já cadastrado no sistema',
           'celular.reqired' => 'Celular obrigatório',
           'celular.max' => 'celular deve conter no máximo 15 caracteres',
           'celular.min' => 'CPF deve conter no mínimo 10 caracteres',
           'email.reqired' => 'email obrigatório',
           'email.email' => ' formato de email inválido',
           'email.unique' => 'email já cadastrado no sistema',
           'password.reqired' => 'senha obrigatório',
    
        ];
        
    }
    }
