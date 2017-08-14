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

  $books = DB::table('books')->where('id', '<=', 2)->get();

    return view('home',compact('books'));

});

Route::get('/historias', 'BooksController@index');

Route::get('/historias/{book}','BooksController@show');


Route::get('/capitulo/{chapter}', function ($id) {

  // $story = DB::table('stories')->find($id);
  $chapter = App\Chapter::find($id); //falta atarlo.

    return view('chapters.show',compact('chapter'));

});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/user', function () {
    return view('user');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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
