<?php

use Illuminate\Http\Request;
use App\Lists;


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

// Produtos
Route::resource('products', 'ProductsApiController');

Route::post('products/upload', 'ProductsApiController@upload');

// Listas
Route::resource('lists', 'ListsApiController');

Route::post('lists/upload', 'ListApiController@upload');

Route::get('lists/{list}/users', 'ListsApiController@getusers');
Route::post('lists/{list}/users', 'ListsApiController@addusers');

Route::get('lists/{list}/products', 'ListsApiController@getproducts');

