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

// nach / kommt die Seite like 'about'....
// will den view welcome laden
Route::get('/','GamesController@show');
Route::get('/spiel/erstellen','GamesController@create');
Route::post('/spiel','GamesController@store');

// auch möglich über einen PagesController..
Route::get('/spieler', 'PlayersController@index');
Route::get('/spieler/erstellen', 'PlayersController@create');
Route::get('/spieler/{player}', 'PlayersController@show');
Route::post('/spieler','PlayersController@store');

// Route::get('/spielfeld', 'FieldsController@index');
Route::post('/spielfeld','FieldsController@store');
Route::get('/spielfeld/erstellen', 'FieldsController@create');
Route::get('/spielfeld/{field}', 'FieldsController@show');

// für erstellen von neuen Spielfeldern




Route::get('/login', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
