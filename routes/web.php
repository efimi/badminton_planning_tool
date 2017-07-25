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
Route::get('/', function () {
    return view('games.show');
});

// auch möglich über einen PagesController..
Route::get('/spieler', function () {
    return view('spieler');
});

Route::get('/spielfeld', function () {
    return view('spielfelder');
});

Route::get('/login', function () {
    return view('login');
});
