<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';

    protected $fillable = [
        'total', 'abono', 'saldo', 'estado', 'orden_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $casts = ['estado' => 'boolean'];
    
    public function orden()
    {
        return $this->belongsTo('App\Models\Orden');
    }

    public function empleado_orden()
    {
        return $this->belongsToMany('App\Models\EmpleadoOrden','detalle_factura')->withPivot('valor')->withTimestamps();
    }


}
