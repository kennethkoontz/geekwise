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

Route::post('/login', function() {
	$email = Input::get('email');
	$password = Input::get('password');
	return "loggin in user $email with $password";

	// TODO Log user in
});

Route::post('/register', function() {
	$fullname = Input::get('fullname');
	$email = Input::get('email');
	$password = Input::get('password');
	return "registering user $fullname, email $email, and password $password";

	// TODO Register user
	// if username
});
