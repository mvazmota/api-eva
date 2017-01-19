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

// Lists
Route::resource('lists', 'ListsController');
Route::get('lists/{list}/users', 'ListsController@getUsers');
//Route::post('lists/{list}/users', 'ListsController@addUsers');
Route::get('lists/{list}/products', 'ListsController@getProducts');

//Family
Route::resource('family', 'FamilyController');
Route::get('family/{family}/users', 'FamilyController@getusers');

//Users
Route::resource('users', 'UsersController');
Route::get('user', 'UsersController@authUser');

