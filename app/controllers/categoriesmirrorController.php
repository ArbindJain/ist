<?php

class categoriesmirrorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($name)
	{
		$querycateogry = $name;
		
        /*echo "<pre>";
        var_dump($news_feeds);
        echo "</pre>";*/
        $users = User::where($querycateogry,'=',1)
        ->get();
        foreach ($users as $key => $value) {
			$users[$key]->fgcount = Follower::where('following_id','=',$value->id)->count();
			$users[$key]->frcount = Follower::where('user_id','=',$value->id)->count();
			$users[$key]->rccount = Audiencereview::where('user_id','=',$value->id)->count();

		}
		return View::make('mirroruser.categoriesmirror')
					->with('users',$users);
			
			
		
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
