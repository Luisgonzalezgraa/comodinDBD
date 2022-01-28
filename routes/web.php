<?php

use Illuminate\Support\Facades\Route;


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
//rutas de Usuario
Route::get('/usuarios','UsuarioController@index');
Route::get('/userlogin','UsuarioController@login')->name('infoLogin');
Route::post('/usuarios/create','UsuarioController@store');
Route::get('/usuarios/{id}','UsuarioController@show');
Route::put('/usuarios/update/{id}','UsuarioController@update');
Route::delete('/usuarios/delete/{id}','UsuarioController@destroy');

//ruta de Libros
Route::get('/libros','LibrosController@index')->name('getGames');
Route::post('/libros/create','LibrosController@store');
Route::get('/libros/{id}','LibrosController@show');
Route::put('/libros/update/{id}','LibrosController@update');
Route::delete('/libros/delete/{id}','LibrosController@destroy');

//ruta de biblioteca
Route::get('/biblioteca','BibliotecaController@index');
Route::post('/biblioteca/create','BibliotecaController@store');
Route::get('/biblioteca/{id}','BibliotecaController@show');
Route::put('/biblioteca/update/{id}','BibliotecaController@update');
Route::delete('/biblioteca/delete/{id}','BibliotecaController@destroy');

//ruta de Descargas
Route::get('/descargas','DescargasController@index');
Route::post('/descargas/create','DescargasController@store');
Route::get('/descargas/{id}','DescargasController@show');
Route::put('/descargas/update/{id}','DescargasController@update');
Route::delete('/descargas/delete/{id}','DescargasController@destroy');




