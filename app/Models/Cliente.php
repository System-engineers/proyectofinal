<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombres', 'direccion', 'telefono', 'email', 'especial'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function ordenes()
    {
        return $this->hasMany('App\Models\Orden');
    }

    public function servicios()
    {
        return $this->belongsToMany('App\Models\Servicio')->withPivot('precio')->withTimestamps();
    }

    public function setNombreClienteAttribute($value)
    {
        $this->attributes['nombres'] = ucwords(strtolower($value));
    }

    public function setNombreDireccionAttribute($value)
    {
        $this->attributes['direccion'] = ucwords(strtolower($value));
    }

}
