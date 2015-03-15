<?php

class LikeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

			$model = Input::get('model');

		
			$blogseries = Input::get('current_id');
			$users = $model::find($blogseries);
			$user = new Like();
			$user->user_id = Sentry::getUser()->id;
			$users->likeable()->save($user);
			
		
		return Response::json();
		
		
		
		
		 
		
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	

	public function gotohell()
	{
		$model =Input::get('model');
		$currentid =input::get('current_id');

		$usefoll = (Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $currentid)->where('likeable_type','=',$model)->delete());
	
		return Response::json();

	}


}
