<?php

class AlbumsController extends \BaseController{

		
	
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
		return View::make('albums.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'albumname' => 'required');

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
            return Redirect::to('album/create')
                ->withErrors($validator);
        
        } 
        else 
        {
            $albums = new Album();
            $albums->albumname = Input::get('albumname');
            $albums->user_id = Sentry::getUser()->id;
            $albums->save();
            $tagdata = Input::get('albumtag');
            $lastInsertedId = $albums->id;
           	$picturefeed = Album::find($lastInsertedId);
           	$picturefeed->tag($tagdata);


            // redirect
            return Redirect::to('imagegallery')->withFlashMessage('Album successfully created!');
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
		$album = Album::find($id);
		$album->delete();

		return Redirect::to('imagegallery')->withFlashMessage('Album deleted successfully!');


	}


}
