<?php

use Faker\Generator as Faker;

$factory->define(App\Disco::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(4),
        'caracteristica' => $faker->sentence(4),
    ];
});
