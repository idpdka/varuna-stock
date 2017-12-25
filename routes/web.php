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

Route::redirect('/', '/1');

Route::get('/{category}/{filter?}', 'Items@index');

Route::post('/addItem', 'Items@addItem');

Route::post('/editItem', 'Items@editItem');

Route::post('/deleteItem', 'Items@deleteItem');

Route::post('/logout', 'Items@logout');

