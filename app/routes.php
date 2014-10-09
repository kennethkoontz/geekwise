<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return View::make('landing');
});

Route::get('/home', function() {
	return View::make('home');
});

Route::post('/login', function() {
	$email = Input::get('email');
	$password = Input::get('password');

	// TODO login user in by auth
	if (true) {
		return Redirect::to('/home');
	} else {
		return Redirect::to('/');
	}
});

Route::post('/register', function() {
	$fullname = Input::get('fullname');
	$email = Input::get('email');
	$password = Input::get('password');

	// register user
	if (true) {
		return Redirect::to('/home');
	} else {
		return Redirect::to('/');
	}
});
