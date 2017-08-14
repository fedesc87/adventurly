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

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/faq', function () {
    return view('faq');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/historias', 'HomeController@index')->name('home');

// Route::get('/historias/{id}', function ($id) {
//
//   $historia = DB::table('historias')->find($id);
//
//   return view('historias.show', compact('historias'));
//
// };

// todo
// -Home
// Login
// Register
// About - FAQ
// Historias - (va a tener varias)
// -> la idea de las historias es que no recargae, sino hacerlo con jquery
// Usuario -> medallas
