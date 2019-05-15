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
Route::get('/categories','CategoryController@index');
Route::get('/category/create','CategoryController@create');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/category/store/','CategoryController@store');
Route::put('/category/update/{id}','CategoryController@update');
Route::get('/category/delete/{id}','CategoryController@destroy');


//News Routes

Route::get('/news', 'NewsController@index');
Route::get('/news/create', 'NewsController@create');
Route::get('/news/edit/{id}', 'NewsController@edit');
Route::post('/news/store/', 'NewsController@store');
Route::put('/news/update/{id}', 'NewsController@update');
Route::get('/news/delete/{id}', 'NewsController@destroy');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
