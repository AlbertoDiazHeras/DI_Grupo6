<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Payment_term;
use Faker\Generator as Faker;

$factory->define(Payment_term::class, function (Faker $faker) {
    return [
        'description'=>$faker->text,
        'deleted'=>false,
    ];
});
