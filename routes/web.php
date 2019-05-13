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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Categories Routes
Route::get('/categories','CategoriaController@index');
Route::get('/categorie/create','CategoriaController@create');
Route::get('/categorie/show/{id}','CategoriaController@show');
Route::post('/categorie/store/{id}','CategoriaController@store');
Route::post('/categorie/update/{id}','CategoriaController@update');
Route::delete('/categorie/delete/{id}','CategoriaController@destroy');


//News Routes

Route::get('/news', 'NoticiaController@index');
Route::get('/news/create', 'NoticiaController@create');
Route::get('/news/show/{id}', 'NoticiaController@show');
Route::post('/news/store/{id}', 'NoticiaController@store');
Route::post('/news/update/{id}', 'NoticiaController@update');
Route::delete('/news/delete/{id}', 'NoticiaController@destroy');






