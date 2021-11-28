<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'article_id' => 1,
        'company_id' => 1,
        'price'=>$faker->randomFloat(1, 20, 30),
        'stock'=>$faker->numberBetween(20, 100),
        'color_name' => $faker->safeColorName(),
        'weight'=>$faker->randomFloat(1, 20, 30),
        'size'=>$faker->randomFloat(1, 20, 30),
        'family_id'=>1,
        'deleted'=>0
    ];
});