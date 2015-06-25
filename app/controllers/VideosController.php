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
        	// Creating SHA1 version for less possible file conflicts
            $sha1 = sha1($vidfile->getClientOriginalName());
            $filename=date('Y-m-d-h-i-s').".".$sha1;
		$file_in  = Input::file('videosrc')->getRealPath();
		$file_out_webm = public_path().'/galleryvideo/webm/'.$filename.'.webm'; 

		$file_out_mp4 = public_path().'/galleryvideo/mp4/'.$filename.'.mp4';

		$file_out_flv = public_path().'/galleryvideo/flv/'.$filename.'.flv'; 

		Sonus::convert()->input($file_in)->bitrate(750, 'video')->output($file_out_webm)->go();
		Sonus::convert()->input($file_in)->bitrate(750, 'video')->output($file_out_mp4)->go();
		Sonus::convert()->input($file_in)->bitrate(750, 'video')->output($file_out_flv)->go();
		 
			
        	
            

        	$vidsnaps = new Video();
        	
			$vidsnaps->videosrc = $filename;
			$vidsnaps->videotitle = Input::get('videotitle');
			$vidsnaps->videodescription = Input::get('videodescription');
			$vidsnaps->user_id = Sentry::getUser()->id;
			$vidsnaps->save();
			$lastinsertedid = $vidsnaps->id;
			$tagdata = Input::get('videotag');
			$addtag = Video::find($lastinsertedid);
			$addtag->tag($tagdata);
			$pix = Video::find($lastinsertedid);
            $tags = $pix->tags;
            foreach ($tags as $tag) {
            		DB::table('tagged')
            ->where('tag_id', $tag->id)
            ->update(array('user_id' => Sentry::getUser()->id));
            }

            // last inserted id
            //$lastInsertedId = $vidsnaps->id;
            $videofeed = Video::find($lastinsertedid);
            $insert_feed = new Feed();
            $insert_feed->user_id = Sentry::getUser()->id;
            $insert_feed->grouptype ='NULL';
            $insert_feed->story ='added a Video';
            $videofeed->feedable()->save($insert_feed);

            // last inserted id
            //$lastInsertedNewsId = $vidsnaps->id;
            $videoNewsfeed = Video::find($lastinsertedid);
            $insert_newsfeed = new Newsfeed();
            $insert_newsfeed->user_id = Sentry::getUser()->id;
            $videoNewsfeed->newsfeedable()->save($insert_newsfeed);

            //last inserted feed id
            $lastInsertedFeedId = $insert_feed->id;
            $feedread = new Readfeed();
            $feedread->feed_id = $lastInsertedFeedId;
            $feedread->save();
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
