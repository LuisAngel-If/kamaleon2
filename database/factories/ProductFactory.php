<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //substr funcion de php, para quitar alguna letra(cadena a procesar, desde que posicion, hasta antes una antes de la ultima posicion )
        'name' => substr($faker->sentence(3), 0, -1),
       // 'name' => $faker->word,
        'imagen' => $faker->imageUrl($width = 400, $height = 400),
        'descripcion' => $faker->text($maxNbChars = 50) ,
        // 'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'fecha' => $faker->word,
        'dimensiones' => $faker->word,
        'estilo' => $faker->word,
        "precio" => $faker->randomFloat(2, 5, 150),

        'technique_id' => $faker->numberBetween(1,5),
        'type_id' => $faker->numberBetween(1,5),
        'genres_id' => $faker->numberBetween(1,5),
        'artist_id' => $faker->numberBetween(1,5)

    ];
});
