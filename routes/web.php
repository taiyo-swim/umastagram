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
    return redirect('/horses');
});

Route::get('/horses', 'PostHorseController@index')->name('umastagram.top');
Route::get('/horse/{id}', 'PostHorseController@show')->name('umastagram.show');

