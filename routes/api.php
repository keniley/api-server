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

Route::get('/user','UserController@list');
Route::get('/user/{user}','UserController@show');
Route::post('/user','UserController@create');

// no resource
Route::any('{path}', function ($path = null) {
    return response()->json(['msg' => 'Resource not found', 'code' => '404'], 404);
})->where('path', '(.*)');
