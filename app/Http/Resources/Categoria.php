<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Categoria extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'nombres' => $this->nombres,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'especial' => $this->especial,
            'ordenes' => $this->ordenes,
            'servicios' => $this->servicios,
        ];
        
    }
}
