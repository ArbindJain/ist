<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($name)
	{
		$querycateogry = $name;
		$news_feeds = DB::table('users')
        ->rightJoin('newsfeeds', 'newsfeeds.user_id', '=', 'users.id')
        ->where($querycateogry,'=',1)
        ->get();
        /*echo "<pre>";
        var_dump($news_feeds);
        echo "</pre>";*/
       
        foreach($news_feeds as $newsFeed)
		{
			 
			$userAvatar = Sentry::findUserById($newsFeed->user_id)->profileimage;
			$userName = Sentry::findUserById($newsFeed->user_id)->name;
			$postedOn = Carbon\Carbon::parse($newsFeed->created_at)->toFormattedDateString();

			$postmodel = $newsFeed->newsfeedable_type;
			$postid = $newsFeed->newsfeedable_id;
			
			if($postmodel == 'Picture')
			{
				$postedimage = Picture::find($newsFeed->newsfeedable_id);
				$postedImage = $postedimage->picturename;
				$postedTitle = $postedimage->picturetitle;
			}
			elseif($postmodel == 'Video')
			{
				$postedimage = Video::find($newsFeed->newsfeedable_id);
				$postedImage = $postedimage->videosrc;
				$postedTitle = $postedimage->videotitle;
			}
			elseif($postmodel == 'Audio')
			{
				$postedimage = Audio::find($newsFeed->newsfeedable_id);
				$postedImage = $postedimage->audiosrc;
				$postedTitle = $postedimage->audiotitle;
			}
			
			


			

			
			$newfeed = new stdClass;
			$newfeed->postid = $postid;
			$newfeed->userpicture = $userAvatar;
			$newfeed->model = $postmodel;
			$newfeed->username = $userName;
			$newfeed->postedon = $postedOn;
			$newfeed->postedimage = $postedImage;
			$newfeed->postedtitle = $postedTitle;
			
			$newarray[] = json_decode(json_encode($newfeed));
			foreach ($newarray as $key => $image) {
				
				$newarray[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->postid)->where('likeable_type','=',$image->model)->first();
				$newarray[$key]->commented = Comment::where('commentable_id','=',$image->postid)->where('commentable_type','=',$image->model)->orderBy('id','desc')->take(3)->get()->reverse();
					
			}
			
			

		}

			

		
		
		
		return View::make('categorie.index')
					->with('newarray',$newarray);
			
			
		
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
