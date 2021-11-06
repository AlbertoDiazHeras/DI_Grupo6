<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Discount;
use Faker\Generator as Faker;

$factory->define(Discount::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'discount' => $faker->numberBetween($min = 10, $max = 30),
        'deleted' => false,
    ];
});
