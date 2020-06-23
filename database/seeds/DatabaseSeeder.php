<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        // $this->call(GenreTableSeeder::class);
        // $this->call(TypeTableSeeder::class);
        // $this->call(TechniqueTableSeeder::class);
        // $this->call(ArtistTableSeeder::class);
      
    }
    //php artisan migrate:refresh --seed (esto reinicia por completo migraciones mas seeder despues de ejecutar las migraciones)
}
