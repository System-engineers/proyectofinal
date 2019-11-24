<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nombres' => $faker->unique()->name, 
        'direccion' => $faker->address, 
        'telefono' => $faker->unique()->e164PhoneNumber, 
        'email' => $faker->safeEmail, 
        'especial' => $faker->randomDigitNotNull
    ];
});
