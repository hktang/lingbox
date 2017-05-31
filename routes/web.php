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

Route::get('/', function () {return view('welcome');});
Route::get('/add', 'EntryController@create')->name('addEntry');
Route::post('/storeEntry', 'EntryController@store')->name('storeEntry');
Route::post('/storeDefinition', 'EntryController@store')->name('storeDefinition');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/voteDown', 'VoteController@voteDown')->name('voteDown');
Route::post('/voteUp', 'VoteController@voteUp')->name('voteUp');
Route::get('/e/{text}', 'EntryController@showByText')->name('showEntrybyText');
Route::get('/{id}', 'EntryController@show')->name('showEntry');