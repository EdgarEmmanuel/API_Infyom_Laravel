<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Operations;
use Faker\Generator as Faker;

$factory->define(Operations::class, function (Faker $faker) {

    return [
        'montant' => $faker->randomDigitNotNull,
        'type' => $faker->word,
        'date' => $faker->word,
        'compte_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
