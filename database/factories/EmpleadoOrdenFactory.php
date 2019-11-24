<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleado;
use App\Models\EmpleadoOrden;
use App\Models\Orden;
use Faker\Generator as Faker;

$factory->define(EmpleadoOrden::class, function (Faker $faker) {
    return [
        'orden_id' => Orden::inRandomOrder()->value('id'),
        'empleado_id' => Empleado::inRandomOrder()->value('id'),
        'cantidad' => rand(1,20), 
        'estado' => rand(0,1)
    ];
});
