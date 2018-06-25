<?php

use Illuminate\Http\Request;

use App\SuppressedPhone;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/suppressed-phones', 'SuppressedPhoneController@index');

Route::get('/suppressed-phones/{phone}', 'SuppressedPhoneController@find');

Route::post('/suppressed-phones', 'SuppressedPhoneController@store');

Route::put('/suppressed-phones/{id}', 'SuppressedPhoneController@update');

Route::delete('/suppressed-phones/{id}', 'SuppressedPhoneController@delete');

Route::get('/suppressed-phones/search', 'SuppressedPhoneController@search');
