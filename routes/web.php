<?php

use DB;

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

 Route::get('/', 'HomeController@welcome')->name('publicHome');
 Route::get('/add/{text?}', 'EntryController@create')->name('addEntry');
 Route::get('/definition/edit/{definitionId}', 'DefinitionController@edit')->name('editDefinition');
Route::post('/definition/update/{definitionId}', 'DefinitionController@update')->name('updateDefinition');
 Route::get('/e/{id}', 'EntryController@show')->name('showEntry');
 Route::get('/home', 'DashboardController@index')->name('home');
Route::post('/storeEntry', 'EntryController@store')->name('storeEntry');
Route::post('/storeDefinition/{entryId}', 'DefinitionController@store')->name('storeDefinition');
Route::post('/vote', 'VoteController@vote')->name('vote');
Route::match(['get', 'post'], '/t/{text?}', 'EntryController@show')->name('showEntryByText');


/*
 * Generate sitemap
 */

Route::get('sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    $sitemap->setCache('lingbox.sitemap', 60*24, true);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached())
    {
         // add item to the sitemap (url, date, priority, freq)
         // $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');

         // get all entries from db
         $entries = DB::table('entries')->orderBy('created_at', 'desc')->get();

         // add every entry to the sitemap
         foreach ($entries as $entry)
         {
            $sitemap->add($entry->text, $entry->updated_at, 1.0, "daily");
         }
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');

});
