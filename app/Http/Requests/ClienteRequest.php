<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'cliente_id' => 'required|integer',
            'servicios' => 'required',
            'precios' => 'required|integer',
        ];
    }
}
