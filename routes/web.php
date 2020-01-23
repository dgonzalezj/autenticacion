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

Route::resource('/notas','NotaController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mostrar/{id}', 'NotaController@show')->name('notas.mostrar');

Route::get('/editar/{id}', 'NotaController@edit' )->name('notas.editar');

Route::delete('/eliminar/{id}', 'NotaController@destroy' )->name('notas.eliminar');

