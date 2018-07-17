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

#arrel
Route::get('/', function () {
    return view('index');
})->name('index');



#discos
Route::get('/discos/cantante/{id}', 'DiscoController@search')->name('discos.bycantante');
Route::get('/discos', 'DiscoController@index')->name('discos.index');

Route::get('/discos/new','DiscoController@new')->name('discos.new');
Route::post('/discos/new','DiscoController@new')->name('discos.new');
Route::get('/discos/edit/{id}','DiscoController@edit')->name('discos.edit');
Route::post('/discos/edit/{id}','DiscoController@edit')->name('discos.edit');
Route::get('/discos/delete/{id}','DiscoController@delete')->name('discos.delete');


#cantantes
Route::get('/cantantes', 'CantanteController@index')->name('cantantes.index');
Route::get('/cantantes/new','CantanteController@new')->name('cantantes.new');
Route::post('/cantantes/new','CantanteController@new')->name('cantantes.new');
Route::get('/cantantes/edit/{id}','CantanteController@edit')->name('cantantes.edit');
Route::post('/cantantes/edit/{id}','CantanteController@edit')->name('cantantes.edit');
Route::get('/cantantes/delete','CantanteController@delete')->name('cantantes.delete');


Auth::routes(); # no es fara servir en aquesta aplicació, pero ja que s'aconsella tenir-ho desde principi...


