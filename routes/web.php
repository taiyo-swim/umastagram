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

//馬の詳細情報の投稿・編集・削除（管理者のみ）
Route::get('/horse/create', 'PostHorseController@create')->name('umastagram.create');
Route::get('/horse/{id}', 'PostHorseController@show')->name('umastagram.show');
Route::post('/horse', 'PostHorseController@store')->name('umastagram.store');

Route::get('/horse/edit/{id}', 'PostHorseController@edit')->name('umastagram.edit');
Route::put('/horse/update/{id}', 'PostHorseController@update')->name('umastagram.update');

