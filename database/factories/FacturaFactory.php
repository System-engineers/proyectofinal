<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Factura;
use App\Models\Orden;
use Faker\Generator as Faker;

$factory->define(Factura::class, function (Faker $faker) {
    return [
        'total' => $faker->numberBetween($min = 25000, $max = 400000),
        'abono' => $faker->numberBetween($min = 25000, $max = 400000),
        'saldo' => $faker->numberBetween($min = 25000, $max = 400000),
        'estado' => rand(0,1) 
    ];
});
