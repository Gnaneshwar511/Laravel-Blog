<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::get('contact', 'PagesController@contact');

Route::get('about', 'PagesController@about');

Route::auth();

//Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::resource('articles', 'ArticlesController');

Route::group(['middleware' => ['admin']], function() {
    Route::resource('users', 'UserController');
});

Route::get('/protected', [function() {
    return "this page requires that you be logged in and be a user";
}])->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('pages', 'PagesController');
});

Route::post('searchit', ['uses' => 'ArticlesController@searchcontent', 'as' => 'searchit']);

Route::get('searchauthor/{authorid}', 'ArticlesController@viewauthorsposts');

Route::get('/info', function() {
    return phpinfo();
});