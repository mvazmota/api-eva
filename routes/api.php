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

//Get produtos de uma lista
Route::get('lists/{list}/users', function ($listId) {

    header('Access-Control-Allow-Origin: *');

    $users = Lists::find($listId)->users()->orderBy('name')->get();

    return $users;
});

//Get produtos de uma lista
Route::get('lists/{list}/products', function ($listId) {

    header('Access-Control-Allow-Origin: *');

    $products = Lists::find($listId)->products()->get();

    return $products;
});