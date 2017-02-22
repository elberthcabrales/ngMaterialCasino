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

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api'], function()
{
	Blade::setEscapedContentTags('[[', ']]');
    Blade::setContentTags('[[[', ']]]');
	//aqui solo crear el index en el resource
	//Route::resource('home', 'AuthenticateController', ['only' => ['index']]);
	Route::post('authenticate', 'AuthenticateController@authenticate');
	Route::resource('registro', 'RegistroController', ['only' => ['index']]);//prueba
	
	/*Route::get('user/delete/{id}','AuthenticateController@delete');
	Route::resource('home', 'AuthenticateController', ['only' => ['index']]);
	//update
	Route::put('user/update/', 'AuthenticateController@update');
	//create
	Route::post('user/create/', 'AuthenticateController@create');*/

	Route::resource('user', 'UserController', ['only' => ['index', 'store','show','update', 'destroy']]);
	Route::put('user/update/', 'UserController@update');

	// Returns the csrf token for the current visitor's session.
	// Route::get('csrf', function() {
	//     return Session::token();
	// });
});


