<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:50|min:3',
            'detalle' => 'required|string',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date',
        ];
    }
}
