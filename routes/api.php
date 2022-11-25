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

//Route::get('/dogs', '')->middleware('auth:api');

Route::get('/dogs', 'DogController@index');
Route::get('/dogs/{dog}', 'DogController@show');
Route::put('/dogs', 'DogController@store');
Route::post('/dogs/{dog}', 'DogController@update');
Route::delete('/dogs/{dog}', 'DogController@destroy');

Route::get('/breeds', 'BreedController@index');
Route::get('/breed/{breed}', 'BreedController@index'); // I dont know if i will need it