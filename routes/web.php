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

Route::get('/', 'IndexController@index');
Route::get('/cliente/{id}/', 'IndexController@show');
Route::get('/create/cliente', 'IndexController@create');
Route::get('/create/plano', 'IndexController@plano');
Route::post('/cliente', 'IndexController@store');
Route::get('/cliente/{id}/edit', 'IndexController@edit');
Route::put('/cliente/{id}/', 'IndexController@update');
Route::delete('/cliente/{id}/', 'IndexController@destroy');
