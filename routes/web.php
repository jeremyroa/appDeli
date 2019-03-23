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
// Route::get('comida/', 'ComidaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::get('/login/cliente', 'Auth\LoginController@showClienteLoginForm');
Route::get('/register/cliente', 'Auth\RegisterController@showClienteRegisterForm');

Route::post('/login/cliente', 'Auth\LoginController@clienteLogin');
Route::post('/register/cliente', 'Auth\RegisterController@createCliente');

Route::view('/cliente', 'cliente');
