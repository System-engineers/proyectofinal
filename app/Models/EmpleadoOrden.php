<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoOrden extends Model
{
    protected $table = 'empleado_orden';

    protected $fillable = [
        'orden_id', 'empleado_id', 'cantidad', 'estado'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    
    public function facturas()
    {
        return $this->belongsToMany('App\Models\Factura','detalle_factura')->withTimestamps();
    }

    public function orden()
    {
        return $this->belongsTo('App\Models\Orden');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado');
    }

    public function serviceable()
    {
        return $this->morphTo();
    }

}
