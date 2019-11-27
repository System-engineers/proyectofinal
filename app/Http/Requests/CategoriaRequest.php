<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'min:3|max:255|string|nullable',
            'descripcion' => 'min:3|max:255|string|nullable',
            'categoria_id' => 'integer|nullable',
            'nombre_servicio' => 'required|min:3|max:255|string',
            'precio' => 'required|min:3|integer',
            'descripcion_servicio' => 'required|min:3|max:255|string'
        ];
    }
}
