<?php

$factory->define(App\Clip::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "description" => $faker->name,
        "notes" => $faker->name,
    ];
});
