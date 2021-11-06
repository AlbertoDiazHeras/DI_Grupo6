<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->word,
        'city'=>$faker->city,
        'cif'=>$faker->city,
        'email' => $faker->unique()->safeEmail,
        'phone'=>$faker->word,
        'del_term_id'=>1,
        'transport_id'=>1,
        'payment_term_id'=>1,
        'bank_entity_id'=>1,
        'discount_id'=>1,  
        'deleted'=>0
    ];
});
