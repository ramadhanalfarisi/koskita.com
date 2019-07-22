<?php

use Illuminate\Support\Facades\Route;
;

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
Route::get('/','UserController@index');
Route::get('/getapi','UserController@getapi');
Route::get('/login','UserController@login');
Route::get('/createkost','UserController@createkost');
Route::post('/create', 'UserController@create');
Route::get('/read','UserController@read');
Route::get('/delete/{id}','UserController@delete');
Route::get('/get_update/{id}','UserController@get_update');
Route::post('/go_login','UserController@go_login');
Route::post('/edit','UserController@edit');
Route::get('/logout','UserController@logout');
Route::get('/register','UserController@register');
Route::post('/go_register','UserController@go_register');
Route::get('/detail/{id}','UserController@detail');
Route::get('/trash','UserController@trash');
Route::get('/restore/{id}','UserController@restore');
Route::get('/forcedelete/{id}','UserController@forcedelete');
Route::get('/user','UserController@user');
Route::get('/fasilitas','FasilitasController@dashboard');
Route::post('/insertapi', 'UserController@insertapi');
Route::delete('/deleteapi', 'UserController@deleteapi');
Route::put('/updateapi', 'UserController@updateapi');

// To use Auth for login,register,forgot password, we can use Auth only typing on the terminal like this "php artisan make:auth"
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
