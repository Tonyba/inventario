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

Route::get('/{categoria?}/{search?}', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/producto/add', 'ProductoController@add')->name('producto.add');
Route::post('/producto/save', 'ProductoController@save')->name('producto.save');
Route::get('/producto/image/{filename}', 'ProductoController@getImage')->name('producto.getImage');
Route::get('/producto/detail/{id}', 'ProductoController@detail')->name('producto.detail');
Route::get('/producto/borrar/{id}', 'ProductoController@borrar')->name('producto.delete');
Route::get('/producto/editar/{id}', 'ProductoController@editar')->name('producto.edit');
Route::post('/producto/actualizar', 'ProductoController@actualizar')->name('producto.update');

Route::get('/categoria/add', 'CategoriaController@add')->name('categoria.add');
Route::get('/categoria/index', 'CategoriaController@index')->name('categoria.index');
Route::get('/categoria/edit/{id}', 'CategoriaController@edit')->name('categoria.edit');
Route::get('/categoria/delete/{id}', 'CategoriaController@delete')->name('categoria.delete');
Route::post('/categoria/save', 'CategoriaController@save')->name('categoria.save');
Route::post('/categoria/update', 'CategoriaController@update')->name('categoria.update');