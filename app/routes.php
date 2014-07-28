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


$api_routes = array(
	'topsales' => [
		'v1' => [
			'users/index',
			'users/create',
		],
		'v2' => [
			'users/index',
			'users/create',
		],
	],
	'topdeals' => [
		'v1' => [
			'users/index',
			'users/create',
		],
		'v2,v2.1,v2.2' => [
			'users/index',
			'users/create', 
		],
		'v2.1' => [
			'users/index',
		],
		'v2.2' => [
			'users/index',
		],
	],
);


$code = '';

foreach ($api_routes as $prefix => $v) {

	$code .= 'Route::group(array("prefix" => "'.$prefix.'"), function(){';
		
		foreach ($v as $version => $vv) {

			$versions = explode(",", $version);

			$version_str = implode('","', $versions);
			
			$code .= 'Route::api(["version" => ["'.$version_str.'"]], function(){';

				foreach ($vv as $kk => $route) {

					list($controller, $action) = explode("/", $route);

					$code .= 'Route::get("'.$route.'","'.'api\\\\'.$prefix.'\\\\'.$versions[0].'\\\\'.ucfirst($controller).'Controller@'.$action.'");';

				}
			
			$code .= '});';		
		}

	$code .= '});';

}

// eval($code);

// echo $code;exit;


// Route::group(array("prefix" => "topsales"), function(){Route::api(["version" => ["v1"]], function(){Route::get("users/index","api\\topsales\\v1\\UsersController@index");Route::get("users/create","api\\topsales\\v1\\UsersController@create");});Route::api(["version" => ["v2"]], function(){Route::get("users/index","api\\topsales\\v2\\UsersController@index");Route::get("users/create","api\\topsales\\v2\\UsersController@create");});});Route::group(array("prefix" => "topdeals"), function(){Route::api(["version" => ["v1"]], function(){Route::get("users/index","api\\topdeals\\v1\\UsersController@index");Route::get("users/create","api\\topdeals\\v1\\UsersController@create");});Route::api(["version" => ["v2","v2.1","v2.2"]], function(){Route::get("users/index","api\\topdeals\\v2\\UsersController@index");Route::get("users/create","api\\topdeals\\v2\\UsersController@create");});Route::api(["version" => "v2.1"], function(){Route::get("users/index","api\\topdeals\\v1\\UsersController@index");});Route::api(["version" => "v2.2"], function(){Route::get("users/index","api\\topdeals\\v2.2\\UsersController@index");});});




// Route::group(array("prefix" => "topsales"), function(){

// 	Route::api(["version" => ["v1"]], function(){
// 		// Route::get("users/index","HomeController@index");
// 		Route::get("users/index","api\\topsales\\v1\\UsersController@index");
// 		Route::get("users/create","UsersController@create");
// 	});

// 	Route::api(["version" => ["v2"]], function(){
// 		return Route::get("users/index","UsersController@index");
// 		return Route::get("users/create","UsersController@create");
// 	});
// });



// // api路由实践
// Route::group(array('prefix' => 'topdeals'), function()
// {


//     Route::api(['version' => 'v1'], function()
// 	{


// 		Route::get('users', function(){
// 			return "users_v1";
// 		});

// 		Route::get('index', function(){
// 			return "index_v1";
// 		});

// 	});

// 	Route::api(['version' => ['v2','v2.1','v2.2']], function()
// 	{

// 		// Route::get('', function(){
// 		// 	return "root_v2";
// 		// });

// 		Route::get('users', function(){
// 			return "users_v2";
// 		});

// 		Route::get('index', function(){
// 			return "index_v2";
// 		});

// 		// Route::get('login',)
// 		// return Route::get('cars', "api\\UsersController@cars");
// 		// return autoRoute("cars");


// 		// return Route::controller("Users","UsersController");

// 	});

// 	Route::api(['version' => 'v2.1'], function()
// 	{

// 		Route::get('users', function(){
// 			return "users_v2.1";
// 		});

// 	});

// 	Route::api(['version' => 'v2.2'], function()
// 	{

// 		Route::get('users', function(){
// 			return "users_v2.2";
// 		});

// 	});


// });


// Route::group(array('prefix' => 'topsales'), function()
// {

//     Route::api(['version' => 'v1'], function()
// 	{

// 		Route::get('users', function(){

// 			// dd(func_get_args());


// 			return "aaaa";
// 		});

// 		Route::get('index', function(){
// 			return "aaaa1";
// 		});

// 	});


// 	Route::api(['version' => 'v2'], function()
// 	{

// 		Route::get('users', function(){
// 			return "aaaa_v2";
// 		});

// 		Route::get('index', function(){
// 			return "aaaa1_v2";
// 		});

// 	});


// });


// function apiAutoRoute($controller, $action, $version, ){
// 	return Route::get($controller.'/'.$action, "api\{}\UsersController@cars");
// }


// api路由实践
// Route::group(array('prefix' => 'topdeals'), function()
// {


//     Route::api(['version' => 'v1'], function()
// 	{


// 		Route::get('users', function(){
// 			return "users_v1";
// 		});

// 		Route::get('index', function(){
// 			return "index_v1";
// 		});

// 	});

// 	Route::api(['version' => ['v2','v2.1','v2.2']], function()
// 	{

// 		// Route::get('', function(){
// 		// 	return "root_v2";
// 		// });

// 		Route::get('users', function(){
// 			return "users_v2";
// 		});

// 		Route::get('index', function(){
// 			return "index_v2";
// 		});

// 		// Route::get('login',)
// 		// return Route::get('cars', "api\\UsersController@cars");
// 		// return autoRoute("cars");


// 		// return Route::controller("Users","UsersController");

// 	});

// 	Route::api(['version' => 'v2.1'], function()
// 	{

// 		Route::get('users', function(){
// 			return "users_v2.1";
// 		});

// 	});

// 	Route::api(['version' => 'v2.2'], function()
// 	{

// 		Route::get('users', function(){
// 			return "users_v2.2";
// 		});

// 	});


// });











