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

Route::get('/','CountriesController@index');
Route::get('/world','CountriesController@index');

Route::get('/world/create', 'CovidController@create');
Route::post('/world','CovidController@store');
Route::get('/world/c/{country}/edit','CovidController@edit');
Route::get('world/c/{country}','CovidController@show');

Route::put('/world/{country}',"CovidController@update");



