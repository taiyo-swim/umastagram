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


//馬の詳細情報の投稿・編集・削除（管理者のみ）
Route::get('/horse/create', 'PostHorseController@create')->name('umastagram.create');
Route::post('/horse', 'PostHorseController@store')->name('umastagram.store');
Route::get('/horse/edit/{id}', 'PostHorseController@edit')->name('umastagram.edit');
Route::put('/horse/update/{id}', 'PostHorseController@update')->name('umastagram.update');
Route::delete('/horse/{id}', 'PostHorseController@destory')->name('umastagram.destory');

Route::get('/horses', 'PostHorseController@index')->name('umastagram.top');
Route::get('/horses/search', 'PostHorseController@search')->name('umastagram.search');
Route::get('/horse/{id}', 'PostHorseController@show')->name('umastagram.show');
