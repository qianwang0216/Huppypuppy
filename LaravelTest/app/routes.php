<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('users', function()
{
    $users = User::all();

    return View::make('users')->with('users', $users);
});
Route::get('listProducts', 'ProductController@listProducts');
Route::post('deleteProduct', 'ProductController@deleteProduct');
Route::get('addProductForm', function () 
{
    return View::make('addProductForm');
});
Route::post('addProduct', 'ProductController@addProduct');
Route::get('editProductForm/{id}', 'ProductController@showEditProductForm');
Route::post('editProduct', 'ProductController@editProduct');
Route::get('uploadImageForm', function () 
{
    return View::make('uploadImageForm');
});
Route::post('uploadFile', 'testController@uploadFile');