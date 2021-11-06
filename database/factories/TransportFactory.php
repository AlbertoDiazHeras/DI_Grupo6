<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Transport;
use Faker\Generator as Faker;

$factory->define(Transport::class, function (Faker $faker) {
    return [
        'min' => $faker->numberBetween($min = 1000, $max = 9000),
        'max' => $faker->numberBetween($min = 1000, $max = 9000),
        'price'=>$faker->numberBetween($min = 1000, $max = 9000),
        'deleted'=>false,
    ];
});
