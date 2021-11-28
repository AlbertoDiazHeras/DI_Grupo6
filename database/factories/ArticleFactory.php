<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->name,
        'price_min'=>$faker->randomFloat(1, 20, 30),
        'price_max'=>$faker->randomFloat(1, 20, 30),
        'color_name' => $faker->safeColorName(),
        'weight'=>$faker->randomFloat(1, 20, 30),
        'size'=>$faker->randomFloat(1, 20, 30),
        'family_id'=>1,
        'deleted'=>0
    ];
});