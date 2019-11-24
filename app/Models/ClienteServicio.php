<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteServicio extends Model
{
    protected $table = 'cliente_servicio';

    protected $fillable = [
        'cliente_id', 'servicio_id', 'precio'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio');
    }

    public function empleado_orden()
    {
        return $this->morphMany('App\Models\EmpleadoOrden', 'serviceable');
    }
}
