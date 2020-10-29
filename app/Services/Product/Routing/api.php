<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/product', function () {
    return view('welcome');
});


Route::middleware('auth:sanctum')->prefix('products')->group(function () {
    Route::get('/show', 'ProductController@index');
    Route::post('/create', 'ProductController@create');
});
