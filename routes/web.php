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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('nuevoProducto', 'ProductosController@create')->name('nuevo_producto');

Route::get('productos', 'ProductosController@index')->name('consulta_productos');

Route::get('productos{idProducto}','ProductosController@show')->name('detalle_producto');

Route::post('registrarProducto','ProductosController@store')->name('registrarProducto');

Route::delete('delProducto/{producto}','ProductosController@destroy')->name('eliminar_producto');

Route::post('actualizarProducto{producto}','ProductosController@update')->name('actualizarProducto');


Route::get('inventario','Inventario_ProductosController@index')->name('consulta_inventario');
