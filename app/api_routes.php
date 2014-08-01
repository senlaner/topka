<?php

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
		'v2.3' => [
			'users/index',
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

foreach ($api_routes as $prefix => $v) 
{

	$code .= 'Route::group(array("prefix" => "'.$prefix.'"), function(){';
		
		foreach ($v as $version => $vv) 
		{

			$versions = explode(",", $version);

			$version_str = implode('","', $versions);
			
			$code .= 'Route::api(["version" => ["'.$version_str.'"]], function(){';

				foreach ($vv as $kk => $route) 
				{

					list($controller, $action) = explode("/", $route);

					$current_version = str_replace(".", "d", $versions[0]);

					$code .= 'Route::get("'.$route.'","'.'api\\\\'.$prefix.'\\\\'.$current_version.'\\\\'.ucfirst($controller).'Controller@'.$action.'");';

				}
			
			$code .= '});';		
		}

	$code .= '});';

}

eval($code);

