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

Route::prefix('v1')->group(function () {
    Route::apiResource('vendors', 'VendorController');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get', 'VendorController@index');
Route::get('/get/{id}', 'VendorController@show');

Route::post('/post', 'VendorController@store');

Route::put('/update/{id}', 'VendorController@update');

Route::delete('/delete/{id}','VendorController@delete');
