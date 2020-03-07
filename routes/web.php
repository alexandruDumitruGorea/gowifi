<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('wp');
});

Auth::routes(['verify' => true]);

Route::get('disabledaccesspoints', 'AccessPointController@disabled');

Route::get('disabledaccesspoints/{id}/restore', 'AccessPointController@restoreAccessPoint');

Route::get('logout', 'NavController@logout');

Route::get('sabersiconectado', 'NavController@sabersiconectado');

Route::resource('technical', 'TechnicalController');

Route::get('disabledtechnical', 'TechnicalController@disabled');

Route::get('disabledtechnical/{id}/restore', 'TechnicalController@restoretechnical');

Route::post('role', 'NavController@role');

Route::get('csrfToken', 'NavController@csrf_token_for_wp');

Route::resource('accesspoint', 'AccessPointController');

Route::get('numConnectionsByMonth', 'ChartController@numConnectionsByMonth');

Route::get('numAccessPointByTechnical', 'ChartController@numAccessPointByTechnical');

Route::get('numConnectionByLocation', 'ChartController@numConnectionByLocation');

Route::get('numConnectionsByLocation', 'ChartController@numConnectionsByLocation');

Route::get('redirectwpresetpass/{token}', 'NavController@redirectwpresetpass');

Route::post('connectionuser', 'ConnectionController@storeconection');

Route::resource('activehour', 'ActiveController');

Route::delete('delactivehour/{activeid}', 'ActiveController@destroy');

Route::fallback(function () {
    return redirect('wp');
});
