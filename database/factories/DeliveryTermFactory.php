<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Delivery_term;
use Faker\Generator as Faker;

$factory->define(Delivery_term::class, function (Faker $faker) {
    return [
        'description'=>$faker->name,
        'deleted'=>false,
    ];
});
