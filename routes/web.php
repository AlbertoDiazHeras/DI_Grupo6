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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
//Ruta verificar correo
Route::get('/register/verify/{code}', 'HomeController@verify');
//Rutas administrador
Route::get('/admin', 'UserController@index');
//Route::post('/admin/eliminar', 'UserController@destroy');
//Route::get('/admin/cerrar', 'LoginController@index');
//Rutas usuarios
Route::resource('inicio', 'UserController');

//Rutas ni idea
Route::get('/home', 'HomeController@index');

