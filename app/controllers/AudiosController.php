<?php

class AudiosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$audios = Audio::all();
		
		return View::make('audio.index')
					->with('audios',$audios);

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
		//add a new audio track to you library
		//Rules for the validator
		$rules = array(
			'audiosrc' => 'required');
		// Validating Implemented rules
		$validator = Validator::make(Input::all(), $rules);

		// check for Final validation
		if ($validator->fails()) {
            return Redirect::to('audiogallery')
                ->withErrors($validator);
        
        } 
        else 
        {	
        	$audiotrack = new Audio();
        	$audfile =  Input::file('audiosrc');
        	$extension = $audfile->getClientOriginalExtension();
        	// Creating SHA1 version for less possible file conflicts
            $sha1 = sha1($audfile->getClientOriginalName());
            $filename=date('Y-m-d-h-i-s').".".$sha1.".".$extension;
            $audfile->move('public/galleryaudio/', $filename);
			$audiotrack->audiosrc = 'galleryaudio/'. $filename;
			$audiotrack->audiotitle = Input::get('audiotitle');
			$audiotrack->audiodescription = Input::get('audiodescription');
			$audiotrack->user_id = Sentry::getUser()->id;
			$audiotrack->save();
            // redirect To astral for audio...
            return Redirect::to('audiogallery')
            ->withFlashMessage('Audio track successfully uploaded!');
        }

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
		$audtrack = Audio::find($id);
		return View::make('audio.edit')
					->with('audtrack',$audtrack);
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
		$audtrack = Audio::find($id);
		$audtrack->audiotitle = Input::get('audiotitle');
		$audtrack->audiodescription = Input::get('audiodescription');
		$audtrack->save();
		return Redirect::route('audiogallery.index')
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
		$audtrack = Audio::find($id);
		$audtrack->delete();

		return Redirect::to('audiogallery');
	}


}
