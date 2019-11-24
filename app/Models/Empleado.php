<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'cedula', 'nombres', 'apellidos', 'direccion', 'telefono', 'email'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function ordenes()
    {
        return $this->belongsToMany('App\Models\Orden')->withTimestamps();
    }

    public function setNombreEmpleadoAttribute($value)
    {
        $this->attributes['nombres'] = ucwords(strtolower($value));
    }

    public function setApellidoEmpleadoAttribute($value)
    {
        $this->attributes['apellidos'] = ucwords(strtolower($value));
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] = ucwords(strtolower($value));
    }
}
