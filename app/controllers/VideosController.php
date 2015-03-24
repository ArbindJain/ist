<?php

class VideosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$videosnap = Video::all();
		return View::make('video.index')
					->with('videosnap',$videosnap);
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
			
        	$vidfile =  Input::file('videosrc');
        	$extension = $vidfile->getClientOriginalExtension();
        	// Creating SHA1 version for less possible file conflicts
            $sha1 = sha1($vidfile->getClientOriginalName());
            $filename=date('Y-m-d-h-i-s').".".$sha1.".".$extension;
            $vidfile->move('public/galleryvideo/', $filename);

;        	$vidsnaps = new Video();
			$vidsnaps->videosrc = 'galleryvideo/'. $filename;
			$vidsnaps->videotitle = Input::get('videotitle');
			$vidsnaps->videodescription = Input::get('videodescription');
			$vidsnaps->user_id = Sentry::getUser()->id;
			$vidsnaps->save();
            // redirect To astral...
            //return Redirect::to('videogallery')
            //->withFlashMessage('video successfully uploaded!');
            return Response::json($vidsnaps);
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
		$vidsnap = Video::find($id);
		return View::make('video.edit')
					->with('vidsnap',$vidsnap);
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
		$vidsnap = Video::find($id);
		$vidsnap->videotitle = Input::get('videotitle');
		$vidsnap->videodescription = Input::get('videodescription');
		$vidsnap->save();
		return Redirect::route('videogallery.index')
						->withFlashMessage('Updated successfully!');


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
		$vidsnap = Video::find($id);
		$vidsnap->delete();

		return Redirect::to('videogallery');
	}


}
