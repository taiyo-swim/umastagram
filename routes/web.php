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

//馬の詳細情報の投稿・編集・削除（管理者権限）
Route::get('/horse/create', 'PostHorseController@create')->name('umastagram.create')->middleware('can:admin'); //馬の情報登録画面表示（管理者）
Route::post('/horse', 'PostHorseController@store')->name('umastagram.store')->middleware('can:admin'); //馬の情報登録（管理者）
Route::get('/horse/edit/{horse}', 'PostHorseController@edit')->name('umastagram.edit')->middleware('can:admin'); //馬の情報編集画面表示（管理者）
Route::put('/horse/update/{horse}', 'PostHorseController@update')->name('umastagram.update')->middleware('can:admin'); //馬の情報の更新（管理者）
Route::delete('/horse/{horse}', 'PostHorseController@destory')->name('umastagram.destory')->middleware('can:admin'); //馬の情報削除（管理者）

Route::get('/horses', 'PostHorseController@index')->name('umastagram.top');  //トップページの表示
Route::get('/horses/search', 'PostHorseController@search')->name('umastagram.search'); //キーワード検索
Route::get('/horse/{horse}', 'PostHorseController@show')->name('umastagram.show'); //馬の詳細ページ表示

Route::get('horse/{horse}/create_picture', 'PostPictureController@create_picture')->name('umastagram.create_picture')->middleware('auth'); //馬の写真投稿画面表示(ログインユーザー）
Route::post('horse/{horse}', 'PostPictureController@upload_picture')->name('umastagram.upload_picture')->middleware('auth'); //馬の写真投稿(ログインユーザー）
Route::get('horse/{horse}/edit/{picture}', 'PostPictureController@edit_picture')->name('umastagram.edit_picture')->middleware('auth'); //馬の写真編集画面表示(ログインユーザー）
Route::get('horse/{horse}/{picture}', 'PostPictureController@show_picture')->name('umastagram.show_picture'); //馬の写真の詳細ページ表示
Route::put('horse/{horse}/update/{picture}', 'PostPictureController@update_picture')->name('umastagram.update_picture')->middleware('auth'); //馬の写真の更新(ログインユーザー）
Route::delete('/horse/{horse}/{picture}', 'PostPictureController@delete_picture')->name('umastagram.delete_picture')->middleware('auth'); //馬の写真削除(ログインユーザー）


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
