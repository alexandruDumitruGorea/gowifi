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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('role', 'NavController@role');

// Route::group(['middleware' => 'web'], function () {
//     Route::get('csrfToken', 'NavController@csrf_token_for_wp');
// });

// Route::group(['middleware' => 'auth:api'], function() {
    Route::post('connection', 'ConnectionController@store');
// });