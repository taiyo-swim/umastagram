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
Route::get('/horse/edit/{horse_id}', 'PostHorseController@edit')->name('umastagram.edit');
Route::put('/horse/update/{horse_id}', 'PostHorseController@update')->name('umastagram.update');
Route::delete('/horse/{horse_id}', 'PostHorseController@destory')->name('umastagram.destory');

Route::get('/horses', 'PostHorseController@index')->name('umastagram.top');
Route::get('/horses/search', 'PostHorseController@search')->name('umastagram.search');
Route::get('/horse/{horse_id}', 'PostHorseController@show')->name('umastagram.show');

Route::get('horse/{horse_id}/create_picture', 'PostPictureController@create_picture')->name('umastagram.create_picture');
Route::post('horse/{horse_id}', 'PostPictureController@upload_picture')->name('umastagram.upload_picture');
Route::get('horse/{horse_id}/{picture_id}', 'PostPictureController@show_picture')->name('umastagram.show_picture');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
