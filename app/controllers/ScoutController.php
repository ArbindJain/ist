<?php

class ScoutController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$scouts = Scout::all();

		return View::make('scout.index')
				->with('scouts', $scouts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$current_user = Sentry::getUser()->id;
		$active_user = User::find($current_user);
		return View::make('scout.create')
					->with('active_user',$active_user);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$agreementfile = Input::file('agreement');
		$sha1 = sha1($agreementfile->getClientOriginalName());
		$filename = date('Y-m-d-H:i:s')."-".rand(1,100).".".$sha1.".";
		Image::make($agreementfile->getRealPath())
				->resize(300,300)
				->save('public/scoutagreement/'. $filename);
		$scoutposter = Input::file('scoutposter');
		$sha1 = sha1($scoutposter->getClientOriginalName());
		$filenamescout = date('Y-m-d-H:i:s')."-".rand(1,100).".".$sha1.".";
		Image::make($scoutposter->getRealPath())
				->resize(300,300)
				->save('public/scoutpostergallery/'. $filenamescout);
		$agreefilename = 'scoutagreement/'.$filename;
		$scoutpostername = 'scoutpostergallery/'.$filenamescout;
		$scout = new Scout();
		$scout->scouttitle = Input::get('scouttitle');
		$scout->scoutdatetime = Input::get('scoutdatetime');
		$scout->scoutduration = Input::get('scoutduration');
		$scout->renumeration = Input::get('renumeration');
		$scout->art =Input::get('art');
		$scout->collection =Input::get('collection');
		$scout->cooking =Input::get('cooking');
		$scout->dance =Input::get('dance');
		$scout->fashion =Input::get('fashion');
		$scout->moviesandtheatre =Input::get('moviesandtheatre');
		$scout->music =Input::get('music');	
		$scout->sports =Input::get('sports');	
		$scout->unordinary =Input::get('unordinary');
		$scout->wanderer =Input::get('wanderer');
		$scout->skills = Input::get('skills');
		$scout->venue = Input::get('venue');
		$scout->scoutdescription = Input::get('scoutdescription');
		$scout->artistdescription = Input::get('artistdescription');
		$scout->agreement = $agreefilename;
		$scout->scoutposter = $scoutpostername;
		$scout->user_id = Sentry::getUser()->id;
		$scout->save();

		return Redirect::to('userProtected#findtalent');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$scout = Scout::find($id);
		$current_user = Sentry::getUser()->id;
		$active_user = User::find($current_user);
		return View::make('scout.show')
			->with('scout',$scout)
			->with('active_user',$active_user);
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


	public function getscout($id)
	{
		$scoutview = Scout::find($id);
		$image_list = ['' => ''] + Picture::where('album_id','=',Sentry::getUser()->id)->lists('picturetitle','picturename');
		$video_list = ['' => ''] + Video::where('user_id','=',Sentry::getUser()->id)->lists('videotitle','videosrc');
		$audio_list = ['' => ''] + Audio::where('user_id','=',Sentry::getUser()->id)->lists('audiotitle','audiosrc');
		

		return View::make('scout.showpublished')
			->with('scoutview',$scoutview)
			->with('image_list',$image_list)
			->with('video_list',$video_list)
			->with('audio_list',$audio_list);
	}


}
