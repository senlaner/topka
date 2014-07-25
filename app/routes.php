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

Route::api(['version' => 'v1'], function()
{
    Route::get('posts', function()
    {
        return Post::all();
    });

    Route::get('posts/{ids}', function($ids)
    {
        $ids = explode(',', $ids);

        return Post::whereIn('id', $ids)->get();
    })->where('ids', '[\d,]+');
});

Route::api(['version' => 'v2'], function()
{
    Route::get('posts', function()
    {
        $embeds = array_filter(explode(',', Input::get('embeds')));

        return Post::with($embeds)->get();
    });
});

/*

Route::get('users', function(){
	// return array("api\UsersController","index"); //"api\UsersController@index";
	return Route::get('users', "api\UsersController@index");
});

Route::get('/', function()
{

	$results = DB::select('select * from users where id = ?', array(100001));

	dd($results);

	return View::make('hello');
});




Route::api(['version' => ['v1','v2'], 'protected' => true], function()
{
	Route::get('users', function()
	{

		throw new Symfony\Component\HttpKernel\Exception\ConflictHttpException('User was updated prior to your request.');
		$users = User::limit(2)->skip(10)->get();
		// return $users;
		// return Response::api()->withCollection($users, new UserTransformer);
		return User::paginate(5);
		return Response::api()->withCollection(User::paginate(5), new UserTransformer);

	});

	Route::get('index', "ApiController@index");

	// Route::get('home', ['protected' => true, function()
 //    {
 //        return User::limit(2)->skip(10)->get();
 //    }]);

});

*/