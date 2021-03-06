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

Route::get('/mailable', 'AlertEmailController@sendEmailAlert');

Auth::routes();
Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@index');



Route::get('post/create', 'PostController@create');
Route::Post('/posts', 'PostController@store');
Route::get('/posts/{id}', 'PostController@show');
Route::Post('/posts/reaction', 'PostController@reaction');
Route::get('/posts/{id}/edit', 'PostController@edit');

Route::patch('/posts/{id}', 'PostController@update');
Route::get('/posts/{id}/delete', 'PostController@destroy');




Auth::routes();

