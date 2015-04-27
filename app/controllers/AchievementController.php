<?php

class AchievementController extends \BaseController {

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
		
			$poster = Input::file('achievement_certificate');
			$sha1 = sha1($poster->getClientOriginalName());
			$filenameposter = date('Y-m-d-H:i:s')."-".rand(1,100).".".$sha1.".";
			Image::make($poster->getRealPath())
					->resize(400,400)
					->save('public/achievementcertificate/'. $filenameposter);
		
		$achievement = new Achievement();
		$achievement->achievements = Input::get('achievements');
		$achievement->achievement_certificate = $filenameposter;
		$achievement->user_id =  Sentry::getUser()->id;
		$achievement->save();

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
	}


}
