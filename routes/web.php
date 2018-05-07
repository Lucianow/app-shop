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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index'); // listar os produtos
Route::get('/admin/products/create', 'ProductController@create'); // exibir formulário para registrar
Route::post('/admin/products', 'ProductController@store'); // registrar os produtos
Route::get('/admin/products/{id}/edit', 'ProductController@edit'); // exibir formulário de editar produtos
Route::post('/admin/products/{id}/edit', 'ProductController@update'); // atualizar os produtos
Route::delete('/products/{id}', 'ProductController@destroy'); // form eliminar