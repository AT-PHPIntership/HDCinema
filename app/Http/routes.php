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


Route::group(['prefix' => 'admin','namespace' => 'Backend'], function () {
    //login
    Route::get('/login', ['as' => 'admin.login', 'uses' => 'AuthController@getLogin']);
    Route::post('/login', ['uses' => 'AuthController@postLogin']);
    //logout
    Route::get('/logout', ['as' => 'admin.logout','uses' => 'AuthController@logout']);

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@index']);
        Route::resource('user', 'UserController');
        Route::resource('film', 'FilmController');
    });
});
