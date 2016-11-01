<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('livros', 'LivroController');

//Navegador : localhost:8000/livros/1
//Route::get('livros/{id}', 'LivroController@verLivro');
Auth::routes();

Route::get('/home', 'HomeController@index');
