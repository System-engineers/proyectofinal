<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'cedula' => $faker->numberBetween($min = 64000000, $max = 200000000),
        'nombres' => $faker->name, 
        'apellidos' => $faker->lastName, 
        'direccion' => $faker->address, 
        'telefono' => $faker->e164PhoneNumber,
        'email' => $faker->safeEmail,
    ];
});
