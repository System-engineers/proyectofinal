<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoOrdenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'orden_id' => 'required|integer',
            'empleado_id' => 'required|integer',
            'cantidad' => 'required|integer',
        ];
    }
}
