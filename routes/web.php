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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('downlines', 'DownlinesController');
Route::resource('customers', 'CustomersController');
Route::resource('suppliers', 'SuppliersController');
Route::resource('deposits', 'DepositsController');
Route::resource('stocks', 'StocksController');
Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::resource('sells', 'SellsController');
Route::resource('nomors', 'NomorsController');

// sells
Route::get('/findProduct','SellsController@findProduct');
Route::get('/findHarga','SellsController@findHarga');


