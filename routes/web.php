<?php
use App\Http\Controllers\ComidaController;

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

Route::get('/select-login', function () {
    return view('select-login-register');
});
Route::get('/select-register', function () {
    return view('select-login-register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::get('/login/cliente', 'Auth\LoginController@showClienteLoginForm')->middleware('guard:cliente')->name('login.cliente');
Route::get('/register/cliente', 'Auth\RegisterController@showClienteRegisterForm')->middleware('guard:cliente')->name('register.cliente');

Route::post('/login/cliente', 'ClienteController@index')->middleware('guard:cliente');
Route::post('/register/cliente', 'ClienteController@store');

Route::view('/cliente', 'cliente', ['comidas' => ComidaController::index()])->middleware('guard:cliente');
