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
Route::get('/register/verify/{code}', 'HomeController@verify')->name('usuarios.validar');
//Rutas administrador
Route::get('/admin', 'UserController@index')->name('admin.panelControl');
Route::get('/articulos', 'ArticleController@index')->name('admin.articulos');
Route::get('/articulo/crear','ArticleController@crear')->name('articulo.crear');
Route::post('/articulo/aniadir','ArticleController@aniadirArticulo')->name('admin.aniadir');

//Route::get('/admin/cerrar', 'LoginController@index');
//Rutas usuarios
Route::resource('inicio', 'UserController');
//Activar usuario
Route::get('/admin/{id}/activar','UserController@activar')->name('admin.activar');
//Descativar usuario
Route::get('/admin/{id}/desactivar','UserController@desactivar')->name('admin.desactivar'); 
//Eliminar usuario
Route::get('/admin/{id}/eliminar','UserController@eliminar')->name('admin.eliminar');
//Editar usuario
Route::get('/admin/{id}/editar','UserController@editar')->name('admin.editar');
//Rutas ni idea
Route::get('/home', 'HomeController@index');
//Ruta edita usuario
Route::post('/admin/actualizar/{id}','UserController@actualizar')->name('admin.actualizar');
//Borrar artículo
Route::delete('/articulo/{id}/borrar','ArticleController@borrar')->name('articulo.borrar');
//Actualizar artículo
Route::get('/articulo/{id}/actualizar','ArticleController@actualizar')->name('articulo.actualizar');

Route::get('/usuarios','UserController@index')->name('admin.activar');

Route::get('/empresa','CompanyController@index')->name('usuarios.empresa');

Route::post('/actualizar', 'CompanyController@actualizar')->name('actualizar.empresa');

Route::get('/pedidos','CompanyController@pedidos')->name('usuarios.pedidos');

Route::get('/albaranes','CompanyController@albaranes')->name('usuarios.albaranes');

Route::get('/facturas','CompanyController@facturas')->name('usuarios.facturas');

Route::get('/actualizar','CompanyController@inicio')->name('usuarios.inicio');

Route::get('pdf', 'InformesController@general')->name('pdf');

Route::get('pdf2', 'InformesController@general2')->name('pdf2');




