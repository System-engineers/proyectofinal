<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categoria;
use App\Models\Servicio;
use Faker\Generator as Faker;

$factory->define(Servicio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'precio' => $faker->numberBetween($min = 25000, $max = 400000),
        'descripcion' => $faker->sentence,
    ];
});
