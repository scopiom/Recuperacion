<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('anonymous/contents');
})->middleware('check');*/
Route::get('/', 'SubscriberController@index')->name('home.contents')->middleware('check');
Route::get('{content}/details', 'SubscriberController@homedetails')->name('home.details')->middleware('check');
Route::put('{content}/details', 'SubscriberController@homesuscription')->name('home.suscription')->middleware('check');


Auth::routes();

//HAY QUE PONER MIDDLEWARES
Route::resource('/cont-all', 'SectionController');
Route::resource('/cont', 'ContentController');
Route::resource('/prop-all', 'SectionController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cont-all', 'ContentController@index')->name('all_contents');
Route::get('/aut', 'ContentController@autlist')->name('all_auts');
Route::get('/subs', 'ContentController@sublist')->name('all_subs');
Route::get('/mods', 'ContentController@modifications')->name('all_contents.mods');
Route::get('/prop-all', 'ContentController@indexlistall')->name('all_proposals');
Route::get('/prop-all/{content}/details', 'ContentController@details')->name('all_contents.details');
Route::put('/prop-all/{content}/details', 'ContentController@status')->name('all_proposals.status');

Route::get('/cont', 'ContentController@indexx')->name('content');
Route::get('/cont/{content}/update', 'ContentController@content_details')->name('contents.details');
Route::put('/cont/{content}/update', 'ContentController@content_edit')->name('contents.edit');
Route::get('/prop', 'ContentController@indexlist')->name('proposals');
Route::get('/prop/{content}/details', 'ContentController@propdetails')->name('proposals.details');
Route::put('/prop/{content}/details', 'ContentController@propstatus')->name('proposals.status');



//Route::get('/cont', 'ContentController@create')->name('content_create');


Route::get('/activate','ContentController@activate')->middleware('auth');
Route::get('/add/{id}' ,'ContentController@add')->middleware('auth');
Route::delete('/delete/{id}' ,'ContentController@delete')->middleware('auth');