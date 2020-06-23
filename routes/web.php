<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'TestController@welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{id}', 'ProductController@show'); //mostrar

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/products', 'ProductController@index');//listar
    Route::get('/products/create', 'ProductController@create'); //crear
    Route::post('/products', 'ProductController@store'); //registrar
    Route::get('/products/{id}/edit', 'ProductController@edit'); //formulario edicion
    Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
    Route::delete('/products/{id}', 'ProductController@destroy'); //eliminar


});

