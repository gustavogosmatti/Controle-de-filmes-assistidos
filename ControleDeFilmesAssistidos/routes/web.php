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


//Rotas Autenticação


Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/register', 'Auth\RegisterController@create');
Route::post('/register', 'Auth\RegisterController@store');
Auth::routes();

//Rotas de Filmes



Route::get('/filmes', 'FilmeController@index')->name('listar_filmes');

Route::get('/filmes/adicionar', 'FilmeController@create'); //Vai para a página de criação de filmes
Route::post('/filmes/adicionar', 'FilmeController@store');



Route::get('/filmes/{id}/edit', 'FilmeController@edit');
Route::put('/filmes/{id}', 'FilmeController@update');

Route::delete('filmes/{id}', 'FilmeController@destroy');



//Rotas de Detalhes

Route::get('/filmes/{film}/detalhes', 'DetalhesController@index')->name('listar_detalhes');

Route::get('/filmes/{film}/detalhes/adicionar', 'DetalhesController@create');
Route::post('/filmes/{film}/detalhes', 'DetalhesController@store');

Route::get('/filmes/{film}/detalhes/{id}/edit', 'DetalhesController@edit');
Route::put('/filmes/{film}/detalhes/{id}', 'DetalhesController@update');

Route::delete('/filmes/{film}/detalhes/{id}', 'DetalhesController@destroy');




