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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('{book}/{chapter}/{verse}', 'BibleController@showVerse');
Route::get('/', 'BibleController@showVerse');
Route::get('/get', 'MainController@index');
Route::get('/old', 'MainController@old');
Route::get('/new', 'MainController@newTestament');
Route::get('/verse', 'MainController@verse');
