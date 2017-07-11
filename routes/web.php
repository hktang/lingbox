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
 Route::get('/definition/edit/{definitionId}', 'DefinitionController@edit')->name('editDefinition');
Route::post('/definition/update/{definitionId}', 'DefinitionController@update')->name('updateDefinition');
 Route::get('/e/{id}', 'EntryController@show')->name('showEntry');
 Route::get('/home', 'HomeController@index')->name('home');
Route::post('/storeEntry', 'EntryController@store')->name('storeEntry');
Route::post('/storeDefinition/{entryId}', 'DefinitionController@store')->name('storeDefinition');
Route::post('/vote', 'VoteController@vote')->name('vote');
 Route::get('/{text}', 'EntryController@show')->name('showEntrybyText');