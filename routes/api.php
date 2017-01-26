<?php

use Illuminate\Http\Request;

Auth::loginUsingId(6);


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
Route::post('products/{product}', 'ProductsController@updateProduct');

// Lists
Route::resource('lists', 'ListsController');
Route::get('lists/{list}/users', 'ListsController@getUsers');
Route::post('lists/{list}/users', 'ListsController@addUsers');
Route::delete('lists/{list}/users', 'ListsController@removeUsers');
Route::get('lists/{list}/products', 'ListsController@getProducts');

//Family
Route::resource('family', 'FamilyController');
Route::get('family/{family}/users', 'FamilyController@getusers');

//Users
Route::resource('users', 'UsersController');
Route::get('user', 'UsersController@authUser');
Route::get('users/{user}/lists', 'UsersController@getLists');
Route::get('users/{user}/events', 'UsersController@getEvents');
Route::get('users/{user}/family', 'UsersController@getFamily');


//Events
Route::resource('events', 'EventsController');
Route::get('events/{event}/users', 'EventsController@getUsers');
Route::post('events/{event}/users', 'EventsController@addUsers');
Route::delete('events/{event}/users', 'EventsController@removeUsers');