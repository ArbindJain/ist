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

		
		$blogseries = Input::get('blog_id');
		$users = Blog::find($blogseries);
		$user = new Like();
		$user->user_id = Sentry::getUser()->id;
		$users->likeable()->save($user);
		return Redirect::back();
		
		
		 
		
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


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$blogid = Input::get('user_id');
		
		$usefoll = (Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $blogid)->where('likeable_type','=','Blog')->delete());
	
	return Redirect::back();
	}


}
