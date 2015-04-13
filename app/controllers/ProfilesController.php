<?php

class ProfilesController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the users
        $abouts = Profile::all();

        // load the view and pass the users
        return View::make('about.index')
            ->with('abouts', $abouts);
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
		// get all the users
        $abouts = Profile::all();

        // load the view and pass the users
        return View::make('about.index')
            ->with('abouts', $abouts);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$propeep = Profile::where('user_id', '=', $id)->first();

   	
			$prouser = $propeep->id ;
		 $about = Profile::find($prouser);
        // show the edit form and pass the nerd
        return View::make('about.edit')
            ->with('about', $about);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		

		 	$propeep = Profile::where('user_id', '=', $id)->first();

   	
			$prouser = $propeep->id ;

			$nerd = Profile::find($prouser);
            $nerd->about_us       = Input::get('about_us');
            $nerd->save();
            if(Input::file('video') == 0)
            {
            	$nerd = Profile::find($prouser);
	            $nerd->about_us = Input::get('about_us');
	            $nerd->education = Input::get('education');
	            $nerd->save();	
            }
            else
            {
            	$vidfile =  Input::file('video');
		        	// Creating SHA1 version for less possible file conflicts
		        $sha1 = sha1($vidfile->getClientOriginalName());
		        $filename=date('Y-m-d-h-i-s').".".$sha1;
				$file_in  = Input::file('video')->getRealPath();
				$file_out_webm = 'public/aboutvideo/webm/'.$filename.'.webm'; 

				$file_out_mp4 = 'public/aboutvideo/mp4/'.$filename.'.mp4';

				$file_out_flv = 'public/aboutvideo/flv/'.$filename.'.flv'; 

				Sonus::convert()->input($file_in)->bitrate(750, 'video')->output($file_out_webm)->go();

				Sonus::convert()->input($file_in)->bitrate(750, 'video')->output($file_out_mp4)->go();
				Sonus::convert()->input($file_in)->bitrate(750, 'video')->output($file_out_flv)->go();

				$nerd = Profile::find($prouser);
	            $nerd->about_us = Input::get('about_us');
	            $nerd->education = Input::get('education');
	            $nerd->video = $filename;
	            $nerd->save();	

            }

            return Redirect::route('about.edit', $id)->withFlashMessage('About updated successfully!');
		
		
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
