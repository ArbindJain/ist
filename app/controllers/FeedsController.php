<?php

class FeedsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$last_id = Input::get('last_id');

		
		if (isset($last_id)) 
			$feeds = DB::table('feeds')->where('id','>',$last_id)->orderBy('created_at','desc')->take(10)->get();
		else 
			$feeds = DB::table('feeds')->orderBy('created_at','desc')->take(10)->get();

		$feed_data = array();
		foreach($feeds as $feed)
		{
			$type = $feed->feedable_type;
			if($type = 'Photo' )
				{
					$icon =  'http://localhost:8000/feedicon/photo-feedicon.png';
				}
			$user = Sentry::findUserById($feed->user_id)->name;
			$profile = 'http://localhost:8000/user/'.$feed->user_id;
			$story = $feed->story;
			$requiredimage = Picture::find($feed->feedable_id); 
			$link = 'http://localhost:8000/galleryimages'.$requiredimage->picturename.'-thumbnail.jpg';
			$read_data = Readfeed::where('feed_id','=',$feed->id)->where('user_id','=',Sentry::getUser()->id)->first();
			if(!isset($read_data)){
			$read_info = new Readfeed();
			$read_info->feed_id = $feed->id;
			$read_info->user_id = Sentry::getUser()->id;
			$read_info->save();

			}
			$is_read = Readfeed::where('feed_id','=',$feed->id)->where('user_id','=',Sentry::getUser()->id)->first()->read;
			
			//echo 'loop';
 			//var_dump($is_read->read);
 			
				
			$feed_data[] = array(
				'id' => $feed->id,
				'type' => $type,
				'icon' => $icon,
				'user' => $user,
				'profile' => $profile,
				'story' => $story,
				'link' => $link,
				'read' => !!$is_read,
				'timestamp' => $feed->created_at,
				);
		}	
		$feed_data = array('okay' => true, 'notifications' => $feed_data);	
		return Response::json($feed_data);
		
		

	}

	


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		/*$last_id = Input::get('last_id');
		$read_all = Readfeed::where('id','<','2')->take(10)->orderBy('created_at','desc')->get();
		echo '<pre>';
		var_dump($read_all);
		echo '</pre>';*/
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
