<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name' =>'required|max:255|string',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:3|max:60|confirmed',
        ];
    }
    public function messages(): array{
        return [
            'name.required'=> 'O campo do nome é obrigatório',
            'name.max' =>'O nome deve ter no máximo 255 caracteres',
            'name.string' => 'O nome deve ser um texto válido',

            'email.required'=> 'O campo de e-mail é necessário',
            'email.email'=> 'Digite um e-mail válido',
            'email.unique'=> 'E-mail já existe em cadastro',

            'password.required'=> 'O campo de senha é necessário',
            'password.min'=> 'A senha deve ter no mínimo 3 caracteres',
            'password.max'=> 'A senha deve ter no máximo 60 caracteres',
            'password.confirmed' => 'As senhas não estão iguais'
        ];
    }
}
