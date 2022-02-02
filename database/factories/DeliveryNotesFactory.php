<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Delivery_notes;
use Faker\Generator as Faker;

$factory->define(Delivery_notes::class, function (Faker $faker) {
    return [
        'num' => $faker->numberBetween($min = 1, $max = 9000),
        'issue_date' => $faker->date,
        'order_id'=>1,
        'deleted'=>0
    ];
});