<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Orden;
use Faker\Generator as Faker;

$factory->define(Orden::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word, 
        'detalle' => $faker->sentence, 
        'fecha_entrada' => $faker->date($format = 'Y-m-d', $max = 'now'), 
        'fecha_salida' => $faker->date($format = 'Y-m-d'), 
    ];
});
