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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout','HomeController@logout');
Route::get('/settings','HomeController@settings');
Route::post('/post-settings','HomeController@postSettings');
Route::get('/events-table','HomeController@eventsTable');
Route::get('/news-table','HomeController@newsTable');





Route::get('/upload-event','HomeController@uploadEvent');
Route::post('/upload-event','HomeController@postUploadEvent');

Route::get('/upload-news','HomeController@uploadNews');
Route::post('/upload-news','HomeController@postUploadNews');



Route::get('/delete-event/{eid}','HomeController@deleteEvent');
Route::get('/delete-news/{nid}','HomeController@deleteNews');

Route::get('/disable-user/{uid}','HomeController@disableMember');

