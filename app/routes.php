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

Route::get('/', function()
{
	return View::make('hello');
});

/**
 * header :
 *  accept application/vnd.{vendor}.{version}+{format}
 * 	eg: accept application/vnd.topka.v2+json
 */

Route::api(['version' => 'v1'], function()
{
    Route::get('users', function()
    {
    	// var_dump($_REQUEST);
        //return User::all();
        return '{"version":1}';
    });

    // Route::resource('posts', 'PostsController');
});

Route::api(['version' => 'v2'], function()
{
    Route::get('users', function()
    {
        //return User::all();
        return '{"version":2}';
    });

    // Route::resource('posts', 'PostsController');
});
