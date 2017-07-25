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

// auch möglich über einen PagesController..
Route::get('/spieler', 'PlayersController@index');
Route::get('/spieler/erstellen', 'PlayersController@create');
Route::get('/spieler/{player}', 'PlayersController@show');

// Route::get('/spielfeld', 'FieldsController@index');
Route::get('/spielfeld/{field}', 'FieldsController@show');



Route::get('/login', function () {
    return view('login');
});
