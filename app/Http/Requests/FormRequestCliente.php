<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestCliente extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $request = [];
        if($this->method() == "POST" || $this->method() == "PUT") {
            return [
                'nome' => 'required',
                'email' => 'required',
                'endereco' => 'required',
                'logradouro' => 'required',
                'cep' => 'required',
                'bairro' => 'required',
            ];
        }
        
        return $request;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'logradouro.required' => 'O campo logradouro é obrigatório.',
            'cep.required' => 'O campo cep é obrigatório.',
            'bairro.required' => 'O campo bairro é obrigatório.',
        ];
    }
}
