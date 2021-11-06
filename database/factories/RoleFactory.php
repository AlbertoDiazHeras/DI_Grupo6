<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use almagest\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'rol'=>'trabajador',
        'deleted'=>false,
    ];
});