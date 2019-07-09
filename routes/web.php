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

// Page
// Route::get('/', function () {
//     return view('home');
// });

// Fonction controller
// Route::get('/', 'MonController@bonjour');

Route::get('/', 'TrelloController@index');
Route::get('/page', 'TrelloController@page');

Route::resource('boards', 'BoardsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
