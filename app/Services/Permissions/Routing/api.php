<?php

use Illuminate\Support\Facades\Route;

Route::get('/permissions', 'PermissionController@index');


Route::middleware('auth:sanctum')->prefix('permission')->group(function () {
    Route::get('/show/{uuid}', 'PermissionController@show');
    Route::post('/create', 'PermissionController@create');
});
