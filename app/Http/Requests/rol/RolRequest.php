<?php

namespace App\Http\Requests\rol;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
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
        'nombre.unique' => 'El ROL ya existe',
        'nombre.required' => 'El campo nombre es obligatorio'
       
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
            'nombre' => 'min:4|required|unique:roles'

            ];
    }
}
