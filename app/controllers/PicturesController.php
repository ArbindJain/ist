<?php

class PicturesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$pictures = Picture::all();

		//Album Model to convert into list laravel TRICKS awesome!! loved it!!
		$albums = ['' => ''] + Album::where('user_id','=',Sentry::getUser()->id)->lists('albumname','id');
		$id = Sentry::getUser()->id;
		$albumss = Album::where('user_id','=',$id)->get();
		// Return the values at the end.
		return View::make('images.index')
			->with('pictures',$pictures)
			->with('albums',$albums)
			->with('albumss',$albumss);
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
		//Rules for the validator
		$rules = array(
			'picturename' => 'required');
		// Validating Implemented rules
		$validator = Validator::make(Input::all(), $rules);

		// check for Final validation
		if ($validator->fails()) {
            return Redirect::to('imagegallery')
                ->withErrors($validator);
        
        } 
        else 
        {	

        	$galleryimage = Input::file('picturename');
			$filename = date('Y-m-d-H:i:s')."-".rand(1,100);
						Image::make($galleryimage->getRealPath())
						->resize(200,200)
						->save('public/galleryimages/'. $filename);
			$product = 'galleryimages/'. $filename;
				
            $pictures = new Picture();
            $pictures->picturename = $product;
            $pictures->album_id = Input::get('album');
            $pictures->save();


            // redirect To astral...
            return Redirect::to('imagegallery')->withFlashMessage('image successfully uploaded!');
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
		$pictures = Picture::where('album_id','=',$id)->get();
		return View::make('images/show')
				->with('pictures',$pictures);
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
