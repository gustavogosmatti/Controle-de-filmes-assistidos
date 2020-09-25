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

Route::get('/filmes', 'FilmeController@index')->name('listar_filmes');
Route::get('/filmes/adicionar', 'FilmeController@adicionar');
Route::post('/filmes/adicionar', 'FilmeController@create');