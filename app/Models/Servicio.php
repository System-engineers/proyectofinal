<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombre', 'precio', 'descripcion', 'categoria_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function clientes()
    {
        return $this->belongsToMany('App\Models\Cliente')->withTimestamps();
    }

    public function empleado_orden()
    {
        return $this->morphMany('App\Models\EmpleadoOrden', 'serviceable');
    }

    public function setNombreServicioAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }


}
