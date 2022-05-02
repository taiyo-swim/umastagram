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

//{horse}はhorsesテーブルの該当レコードのid、{picture}はpicturesテーブルの該当レコードのid

//馬の詳細情報の投稿・編集・削除（管理者のみ）
Route::get('/horse/create', 'PostHorseController@create')->name('umastagram.create');
Route::post('/horse', 'PostHorseController@store')->name('umastagram.store');
Route::get('/horse/edit/{horse}', 'PostHorseController@edit')->name('umastagram.edit');
Route::put('/horse/update/{horse}', 'PostHorseController@update')->name('umastagram.update');
Route::delete('/horse/{horse}', 'PostHorseController@destory')->name('umastagram.destory');

Route::get('/horses', 'PostHorseController@index')->name('umastagram.top');
Route::get('/horses/search', 'PostHorseController@search')->name('umastagram.search');
Route::get('/horse/{horse}', 'PostHorseController@show')->name('umastagram.show');

Route::get('horse/{horse}/create_picture', 'PostPictureController@create_picture')->name('umastagram.create_picture');
Route::post('horse/{horse}', 'PostPictureController@upload_picture')->name('umastagram.upload_picture');
Route::get('horse/{horse}/edit/{picture}', 'PostPictureController@edit_picture')->name('umastagram.edit_picture');
Route::get('horse/{horse}/{picture}', 'PostPictureController@show_picture')->name('umastagram.show_picture');
Route::put('horse/{horse}/update/{picture}', 'PostPictureController@update_picture')->name('umastagram.update_picture');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
