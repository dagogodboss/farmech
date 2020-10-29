<?php

use Illuminate\Support\Facades\Route;

Route::get('/role', 'RoleController@index');


Route::middleware('auth:sanctum')->prefix('products')->group(function () {
    Route::get('/show/{uuid}', 'RoleController@show');
    Route::post('/create', 'RoleController@create');
});
