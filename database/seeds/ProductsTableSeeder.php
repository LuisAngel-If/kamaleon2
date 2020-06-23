<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Technique;
use App\Genre;
use App\Type;
use App\Artist;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make crea objetos en bd, create crea y guarda objetos en bd
       
       factory(Technique::class, 5)->create();
        factory(Genre::class, 5)->create();
        factory(Type::class, 5)->create();
        factory(Artist::class, 5)->create();
        factory(Product::class, 20)->create();

        // $techniques = factory(Technique::class, 5)->create();
        // $techniques->each(function ($technique) {
        //     $products = factory(Product::class, 20)->make()
        //     $technique->products()->saveMany($products);

        //     $techniques->each(function ($genre) {

        // });

    }
}
