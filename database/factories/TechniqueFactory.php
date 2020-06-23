<?php

use Faker\Generator as Faker;
use App\Technique;

$factory->define(Technique::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->word
    ];
});
