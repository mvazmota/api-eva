<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Products
Route::resource('products', 'ProductsController');
Route::post('products/{products}', 'ProductsController@updateproduct');

// Lists
Route::resource('lists', 'ListsController');
Route::get('lists/{list}/users', 'ListsController@getusers');
Route::post('lists/{list}/users', 'ListsController@addusers');
Route::get('lists/{list}/products', 'ListsController@getproducts');

//Family
Route::resource('family', 'FamilyController');
Route::get('family/{family}/users', 'FamilyController@getusers');

//Users
Route::resource('users', 'UsersController');


