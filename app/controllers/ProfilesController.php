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
