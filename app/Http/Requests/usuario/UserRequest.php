<?php

namespace App\Http\Requests\usuario;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function messages()
    {
    return [
        'name.min' => 'El nombre debe tener minimo 5 y maximo 15 caracteres',
        'name.max' => 'El nombre debe tener minimo 5 y maximo 15 caracteres',

        'email.email'  => 'El email es invalido',
        'email.unique'  => 'Ya existe una cuenta con este email',
        'email.min'  => 'El email debe contener minimo 10 y maximo 80 caracteres',
        'email.max'  => 'El email debe contener minimo 10 y maximo 80 caracteres',

        'password.min' =>'La contraseña debe contener minimo 8 y maximo 16 caracteres',
        'password.max' =>'La contraseña debe contener minimo 8 y maximo 16 caracteres',
        'password.required' =>'El campo contraseña es obligatorio '
    ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:5|max:15|required',
            'email' => 'min:10|max:80|email|unique:users|required',
            'password' => 'min:8|max:16|required'
         ];
    }
}
