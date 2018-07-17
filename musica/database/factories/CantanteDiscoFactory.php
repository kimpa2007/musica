<?php

use Faker\Generator as Faker;

$factory->define(App\CantanteDisco::class, function (Faker $faker) {
    return [
        'disco_id' => function() {
            return factory(App\Disco::class)->create()->id;
        },
        'cantante_id' => function() {
            return factory(App\Cantante::class)->create()->id;
        }
    ];
});
