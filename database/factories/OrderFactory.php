<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'num' => $faker->numberBetween($min = 1, $max = 9000),
        'issue_date' => $faker->date,
        'origin_company_id'=>1,
        'target_company_id'=>1,
        'deleted'=>0
    ];
});