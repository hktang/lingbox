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

Route::get('/', function () {return view('welcome');});
Route::get('/add', 'EntryController@create')->name('addEntry');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/e/{text}', 'EntryController@showByText')->name('showEntrybyText');
Route::get('/{id}', 'EntryController@show')->name('showEntry');

Auth::routes();
