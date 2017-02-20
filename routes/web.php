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

Route::get('/', 'PageController@getIndex');

Route::get('/about', 'PageController@getAbout');

Route::get('/movies', 'PageController@getMovies');

Route::get('/contact', 'PageController@getContact');

Route::resource('/movies','MoviesController');

Route::get('/movies/{movie}', ['as'=>'movies.featured',
							'uses'=>'MoviesController@getFeaturedmovie']);


Route::POST('/movies/{suggestmovie}', [
		'as'=>'movies.suggestmovie',
		'uses'=>'MoviesController@postSuggestMovie'

	]);


Auth::routes();

Route::get('/home', 'HomeController@index');
