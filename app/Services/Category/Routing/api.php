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

Route::get('/category', function () {
    return view('welcome');
});


Route::middleware('auth:sanctum')->prefix('category')->group(function () {
    Route::get('/show', 'CategoryController@index');
    Route::post('/create', 'CategoryController@create');
});
