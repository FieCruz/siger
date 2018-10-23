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
Route::resource('/estados', 'EstadosController');
Route::resource('/cidades', 'CidadesController');
Route::get('/cidades/uf/{estado}', 'CidadesController@porestado');
Route::resource('/campus', 'CampusController');
Route::resource('/equipamentos', 'EquipamentosController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
