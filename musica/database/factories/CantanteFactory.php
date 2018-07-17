<?php

use Faker\Generator as Faker;

$factory->define(App\Cantante::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstname,
        'caracteristica' => $faker->sentence(4),
    ];
});
