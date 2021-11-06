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
Route::get('/home', 'UserController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'UserController@index');

//Route::get('/eliminar{id}', 'UserController@destroy');


//Route::get('/admin', 'UserController@edit');
/*Route::get('admin/{id}', function($id){
	return "Eliminando el usuario $id de la aplicación";
});*/