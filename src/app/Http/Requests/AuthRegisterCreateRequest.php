<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|min:6|max:255|unique:users',
            'password' => 'required|string|min:8|max:16',
            'password_confirmation' => 'required|string|min:2|max:16'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nome completo',
            'email' => 'Email',
            'password' => 'Senha',
            'password_confirmation' => 'Confirmação da Senha'
        ];
    }    
}
