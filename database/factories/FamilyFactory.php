<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Family;
use Faker\Generator as Faker;

$factory->define(Family::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'profit_margin' => $faker->randomFloat(1, 20, 30),
        'deleted'=>0
    ];
});