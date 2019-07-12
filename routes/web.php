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

Route::get('/', 'TrelloController@index');

// Route::resource('boards', 'BoardsController');
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('lists', 'ListsController');
// Auth::routes();
// Route::get('lists/create/{id}', 'ListsController@create');

Route::resource('cards', 'CardsController');
Auth::routes();
Route::get('cards/create/{id}', 'CardsController@create');
Route::get('items/create/{id}', 'CardsController@create');

// Tableaux
Route::get('boards', 'BoardsController@boards');
Route::get('boards/{id}', 'BoardsController@show');
Route::get('boards/delete/{id}', 'BoardsController@destroy');
Route::post('board', 'BoardsController@store');

// Listes
Route::post('list', 'ListsController@store');