<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function servicios()
    {
        return $this->hasMany('App\Models\Servicio');
    }

    public function setNombreCategoriaAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }

}
