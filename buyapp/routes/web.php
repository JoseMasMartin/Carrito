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

Route::get('/products/search','ProductController@search');

Route::get('/products/show_car','ProductController@showCar');

Route::get('/users','UserController@index');

Route::get('/products','ProductController@index');

Route::get('/products/{id}/edit','ProductController@edit');

Route::get('/products/create','ProductController@create');

Route::post('/products','ProductController@store');

Route::put('/products/{id}','ProductController@update');

Route::delete('/products/{id}','ProductController@destroy');

Route::get('/providers','ProviderController@index');

Route::get('/providers/create','ProviderController@create');

Route::post('/providers','ProviderController@store');

Route::get('/providers/{id}/edit','ProviderController@edit');

Route::put('/providers/{id}','ProviderController@update');

Route::delete('/providers/{id}','ProviderController@destroy');

Route::get('/purchases/create','PurchaseController@create');
