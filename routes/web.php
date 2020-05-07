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



Route::resource('salas', 'SalaController');

Route::resource('equipos', 'EquipoController');

Route::get('reportes/pdf/mantenimiento', 'EquipoController@mantenimientopdf');
Route::get('reportes/excel/mantenimiento', 'EquipoController@mantenimientoexcel');

Route::get('reportes/pdf/sala/{id}', 'EquipoController@salapdf');
Route::get('reportes/excel/sala/{id}', 'EquipoController@salaexcel');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
