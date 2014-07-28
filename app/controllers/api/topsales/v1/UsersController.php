<?php

namespace Api\topsales\v1;
use DB;

class UsersController extends \BaseController {



	function getIndex(){

	}

	function postIndex(){
		
	}



	/**
	 * Display a listing of the resource.
	 * GET /api/users
	 *
	 * @return Response
	 */
	public function index()
	{

		$results = DB::select('select * from users where id = ?', array(100001));

		dd($results);
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return "user_create_v1";
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api/users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /api/users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /api/users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /api/users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}