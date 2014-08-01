<?php

class SignupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// if (Hash::check('secret', $hashedPassword))
		// {
		// 	return Redirect::route('/');
		// }
		// return "signup";

		$items = [
			['name'=>'huxf','title'=>'huxiongfei'],
			['name'=>'huxf2','title'=>'huxiongfei2'],
		];
		// $items = [];
		return View::make("signup/index",['items'=>$items]);
	}

}
