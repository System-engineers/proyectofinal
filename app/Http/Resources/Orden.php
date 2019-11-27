<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Orden extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'nombre' => $this->nombre, 
            'detalle' => $this->detalle, 
            'fecha_entrada' => $this->fecha_entrada, 
            'fecha_salida' => $this->fecha_salida, 
            'cliente_id' => $this->cliente,
        ];
    }
}
