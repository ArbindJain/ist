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
		
        	
        	//$audiotrack = 'apple';
            // redirect To astral for audio...
            //return Redirect::to('audiogallery')
            //->withFlashMessage('Audio track successfully uploaded!');
           // return Response::json($audtrack)

		
        	$audfile =  Input::file('audiosrc');
        	// Creating SHA1 version for less possible file conflicts
            $sha1 = sha1($audfile->getClientOriginalName());
            $filename=date('Y-m-d-h-i-s').".".$sha1;
            //$audfile->move('public/galleryaudio/', $filename);

			$file_in  = Input::file('audiosrc')->getRealPath();
			$file_out_ogg = 'public/galleryaudio/ogg/'.$filename.'.ogg';
			$file_out_mp3 = 'public/galleryaudio/mp3/'.$filename.'.mp3';

			Sonus::convert()->input($file_in)->output($file_out_ogg)->go();

			Sonus::convert()->input($file_in)->output($file_out_mp3)->go();
			
            $audiotrack = new Audio();
			$audiotrack->audiosrc = $filename;
			$audiotrack->audiotitle = Input::get('audiotitle');
			$audiotrack->audiodescription = Input::get('audiodescription');
			$audiotrack->user_id = Sentry::getUser()->id;
			$audiotrack->save();
            // redirect
            return Response::json($audiotrack);
       

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
