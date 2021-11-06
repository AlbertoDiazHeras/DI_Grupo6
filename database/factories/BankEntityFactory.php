<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Bank_entity;
use Faker\Generator as Faker;

$factory->define(Bank_entity::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'ccc' => $faker->name,
        'deleted' => false,
    ];
});
