<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';

    protected $fillable = [
        'nombre', 'detalle', 'fecha_entrada', 'fecha_salida', 'cliente_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function empleados()
    {
        return $this->belongsToMany('App\Models\Empleado')->withTimestamps();
    }

    public function facturas()
    {
        return $this->hasMany('App\Models\Factura');
    }

    public function setNombreOrdenAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }

}
