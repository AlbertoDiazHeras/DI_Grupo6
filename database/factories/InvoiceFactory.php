<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'num' => $faker->numberBetween($min = 1, $max = 9000),
        'issue_date' => $faker->date,
        'delivery_note_id'=>1,
        'deleted'=>0
    ];
});