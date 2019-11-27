<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'cedula' => 'required|integer|min:3',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|integer',
            'email' => 'required|email|max:255',
        ];
    }
}
