<?php

class ScoutapplyController extends \BaseController {

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
		//
		$scoutapply = new Scoutadd();
		$scoutapply->scout_id = Input::get('scout_id');
		$scoutapply->user_id = Sentry::getUser()->id;
		$scoutapply->audio = Input::get('audio');
		$scoutapply->video = Input::get('video');
		$scoutapply->image = Input::get('image');
		$scoutapply->applied = Input::get('applied');
		$scoutapply->shortlist = Input::get('shortlist');
		$scoutapply->selected = Input::get('selected');
		$scoutapply->save();

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
		
		$commandchecker = Input::get('shortlist');
		if($commandchecker == '1'){

			$shortlisting = Scoutadd::find($id);

			$shortlisting->shortlist = '1';
			$shortlisting->selected = 'NULL'; 
			$shortlisting->save();

		}
		else
		{
			$selectlisting =  Scoutadd::find($id);
			$selectlisting->selected = '1';
			$selectlisting->shortlist ='NULL';
			$selectlisting->save();

		}
		return Redirect::back();
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
