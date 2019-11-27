<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpleadoOrden extends JsonResource
{
    
    public function toArray($request)
    {
        return  [
            'orden_id' => $this->orden_id,
            'empleado_id' => $this->empleado_id,
            'orden' => $this->orden,
            'empleado' => $this->empleado,
            'cantidad' => $this->cantidad,
        ];
    }
}
