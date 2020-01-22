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

Auth::routes();

// Home
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Note
Route::get('/notes/create', 'NoteController@create')->middleware('auth');
Route::post('/notes', 'NoteController@store')->middleware('auth');
Route::get('/notes/{note}', 'NoteController@show')->middleware('auth');
Route::get('/notes/{note}/edit', 'NoteController@edit')->middleware('auth');
Route::post('/notes/{note}', 'NoteController@update')->middleware('auth');
Route::post('/notes/delete/{note}', 'NoteController@destroy')->middleware('auth');

// Tag
Route::get('/tags', 'TagController@index')->middleware('auth');
Route::post('/tags', 'TagController@store')->middleware('auth');
Route::post('/tags/delete/{tag}', 'TagController@destroy')->middleware('auth');