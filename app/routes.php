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
	if (Auth::check()) {
		return Redirect::to('/home');
	}
	return View::make('landing');
});

Route::get('/home', function() {
	if (!Auth::check()) {
		return Redirect::to('/');
	}
	$full_name = Auth::user()->full_name;
	$user_id = Auth::user()->id;
	$messages = DB::select("select messages.*, users.full_name
							from messages
							join users on users.id = messages.user_id
							where user_id in (
								select follower_id
								from followers where user_id = ?
						  	) or messages.user_id = ?
							order by created_at desc", array($user_id, $user_id));
	return View::make('home', array('full_name'=>$full_name, 'messages'=>$messages));
});

Route::post('/login', function() {
	$email = Input::get('email');
	$password = Input::get('password');

	// TODO login user in by auth
	if (Auth::attempt(array('email' => $email, 'password' => $password))) {
		return Redirect::to('/home');
	} else {
		return Redirect::to('/')->with('login_message', 'Email and/or Password is incorrect.');
	}
});

Route::post('/register', function() {
	$fullname = Input::get('fullname');
	$email = Input::get('email');
	$password = Input::get('password');

	// register user
	if ($fullname && $email && $password) {
		$user = new User;
		$user->full_name = $fullname;
		$user->email = $email;
		$user->password = Hash::make($password);
		$user->save();
		Auth::loginUsingId($user->id);
		return Redirect::to('/home');
	} else {
		return Redirect::to('/')->with('register_message', 'Please set Name, Email, and Password');
	}
});

Route::post('/messages', function() {
	if (!Auth::check()) {
		return 'Nope no can do.';
	}
	$user = Auth::user();
	$body = Input::get('message');
	$message = new Message;
	$message->body = $body;
	$message->user_id = $user->id;
	$message->save();
	return Redirect::to('/home');
});

Route::get('/logout', function() {
	Auth::logout();
	return Redirect::to('/');
});