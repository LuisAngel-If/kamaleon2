<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('imagen')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('fecha');
            $table->string('dimensiones')->nullable();
            $table->string('estilo')->nullable();
            $table->float('precio')->nullable();
            $table->boolean('destacado')->default(false);
            //FK
            $table->integer('technique_id')->unsigned()->nullable();
            $table->foreign('technique_id')->references('id')->on('techniques');

            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types');

            $table->integer('genres_id')->unsigned()->nullable();
            $table->foreign('genres_id')->references('id')->on('genres');

            $table->integer('artist_id')->unsigned()->nullable();
            $table->foreign('artist_id')->references('id')->on('artists');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
