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

Route::redirect('/', '/items/1');

Route::redirect('/items', '/items/1');

Route::get('/items/{category}/{filter?}', 'Items@index');

Route::get('/suppliers/{filter?}', 'Suppliers@index');

Route::post('/addItem', 'Items@addItem');

Route::post('/editItem', 'Items@editItem');

Route::post('/deleteItem', 'Items@deleteItem');

Route::post('/addSupplier', 'Suppliers@addSupplier');

Route::post('/editSupplier', 'Suppliers@editSupplier');

Route::post('/deleteSupplier', 'Suppliers@deleteSupplier');

Route::post('/logout', 'Items@logout');

