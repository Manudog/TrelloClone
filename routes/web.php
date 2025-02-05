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
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// Tableaux
Route::get('boards', 'BoardsController@boards');
Route::get('boards/{id}', 'BoardsController@show');
Route::get('boards/delete/{id}', 'BoardsController@destroy');
Route::post('board', 'BoardsController@store');

// Listes
Route::post('liste', 'ListesController@store');
Route::post('liste/title', 'ListesController@update');

// Cartes
Route::post('card', 'CardsController@store');

// Items
Route::post('item', 'CardsController@addItem');