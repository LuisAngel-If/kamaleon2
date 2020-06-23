<?php

use Faker\Generator as Faker;
use App\Artist;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        //
        'name' => ucfirst($faker->word),
        'Ap' => ucfirst($faker->word),
        'Am' => ucfirst($faker->word),
        'nameArt' => ucfirst($faker->word)
    ];
});
