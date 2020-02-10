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
// https://github.com/darrencraig/LaraPress

Route::get('/', function () {
    return 'hola';
});

Route::get('nini', 'PruebaController@prueba');
