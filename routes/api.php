<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


/** JWT */
//Route::post('/login', 'Api\Auth\LoginController@login');
//
//Route::group(['middleware' => ['auth:api']], function () {
//    Route::get('/products/productsList', 'ProductsController@productsList');
//
//});


//Passport

Route::post('/login', 'apis\v1\LoginController@login');\
//
//Route::group(['middleware' => ['auth:api']], function () {
//    Route::get('/products/productsList', 'ProductsController@productsList');
//
//});

Route::get('/products/productsList', 'ProductsController@productsList')->middleware('auth:api');

