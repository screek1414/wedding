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

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', 'ViewController@main');
Route::get('orders', 'ViewController@orders')->middleware('auth');
Route::get('orders/create', 'OrderController@create');
Route::post('orders/store', 'OrderController@store');
Route::get('orders/show', 'OrderController@show');
Route::post('orders/destroy', 'OrderController@destroy');


