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

require $app['path.base'].'/app/api_routes.php';

Route::get('/', function()
{

	// $results = DB::select('select * from users where id = ?', array(100001));

	$results = User::find(100001);

	dd($results->nickname);

	// return View::make('hello');

	return "AAAAA";
});

Route::get("signup","SignupController@index");



