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

Route::get('/', 'PageController@welcome');

Auth::routes();

Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');



Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');


route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function(){
    Route::get('/products', 'ProductController@index'); // listar os produtos
    Route::get('/products/create', 'ProductController@create'); // exibir formulário para registrar
    Route::post('/products', 'ProductController@store'); // registrar os produtos
    Route::get('/products/{id}/edit', 'ProductController@edit'); // exibir formulário de editar produtos
    Route::post('/products/{id}/edit', 'ProductController@update'); // atualizar os produtos
    Route::delete('/products/{id}', 'ProductController@destroy'); // form eliminar

    Route::get('/products/{id}/images', 'ImageController@index');
    Route::post('/products/{id}/images', 'ImageController@store'); // atualizar os produtos
    Route::delete('/products/{id}/images', 'ImageController@destroy'); // form eliminar
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // destacar

    Route::get('/categories', 'CategoryController@index'); // listar as categorias
    Route::get('/categories/create', 'CategoryController@create'); // exibir formulário para registrar
    Route::post('/categories', 'CategoryController@store'); // registrar categorias
    Route::get('/categories/{category}/edit', 'CategoryController@edit'); // exibir formulário de editar categorias
    Route::post('/categories/{category}/edit', 'CategoryController@update'); // atualizar as categorias
    Route::delete('/categories/{category}', 'CategoryController@destroy'); // form eliminar

});

