<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

use function Laravel\Prompts\password;

class FormRequestUsuario extends FormRequest
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
        if ($this->isMethod('post') || $this->isMethod('put')) {
            $rules = [
                'name' => 'required|min:5',
                'password' => [
                    'required',
                    'string',
                    'min:10',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/',
                ],
            ];

            // Adicione a regra de validação do email somente para o método POST
            if ($this->isMethod('post')) {
                $rules['email'] = 'required|unique:users|email|min:10|max:100';
            }

            return $rules;
        }

        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'Com no mínimo 5 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório, com no mínimo 10 caracteres e máximo de 255.',
            'email.unique' => 'E-mail já cadastrado',
            'email.email' => 'E-mail inválido',
            'email.min' => 'Com no mínimo 10 caracteres.',
            'email.max' => 'Com no máximo 100 caracteres.',
            'password.required' => 'O campo senha é obrigatório, com no mínimo 8 caracteres e máximo de 100, com letras maiusculas e minusculas, números e caracteres especiais.',
            'password.min' => 'Com no mínimo 10 caracteres, misturar letras maiusculas e minusculas, números e caracteres especiais.',
            'password.regex' => 'Não deve conter palavras fáceis e misturar números, letras maiusculas e minusculas, caracteres especiais.',
        ];
    }
}

/**
 * Dicas
 * Url: https://stackoverflow.com/questions/31539727/laravel-password-validation-rule
 * Url: https://laravel.com/docs/10.x/validation
 */
