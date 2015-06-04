<?php

class StandardUserController extends \BaseController {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getHome()
	{
		
		
		return View::make('protected.standardUser.user_dashboard');
	}

	public function getUserProtected()
	{
		$current_user = Sentry::getUser()->id;
		$active_user = User::find($current_user);
		$albums = ['0' => 'default'] + Album::where('user_id','=',Sentry::getUser()->id)->lists('albumname','id');
		$articles = Blog::where('user_id','=',$current_user)->get();
		foreach ($articles as $key => $blogdata) {

			$articles[$key]->liked = Like::where('user_id','=',$blogdata->user_id)->where('likeable_id', '=', $blogdata->id)->where('likeable_type','=','Blog')->first();
			# code...
			$articles[$key]->counted = Like::where('likeable_id','=',$blogdata->id)->count();

		}
		$scouts = Scout::where('user_id','=',$current_user)->get();

		foreach ($scouts as $key => $scoutvalue) {

			$scouts[$key]->liked = Like::where('user_id','=',$scoutvalue->user_id)->where('likeable_id', '=', $scoutvalue->id)->where('likeable_type','=','Scout')->first();
			
			$scouts[$key]->counted = Like::where('likeable_id','=',$scoutvalue->id)->count();
		}
		
		$scoutadds =  Scoutadd::where('user_id','=',$current_user)->where('applied','=','YES')->get();
		foreach ($scoutadds as $key => $make) 
		{
			
			$scoutadds[$key]->scouted = Scout::where('id','=',$make->scout_id)->get();

			
		}

		
		
		$aud_review = Audiencereview::where('user_id','=',$current_user)->get();
		$performances = Performance::where('user_id','=',$current_user)->get();
		$abouts = Profile::where('user_id','=',$current_user)->first();

		$all_albums = Album::where('user_id','=',$current_user)->with('image')->get();
		foreach ($all_albums as $key => $album) $all_albums[$key]->picture = Picture::where('album_id', '=', $album->id)->first();
		$user_videos = Video::where('user_id','=',$current_user)->get();
		foreach ($user_videos as $key => $image) {

			$user_videos[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Video')->first();
			$user_videos[$key]->commented = Comment::where('commentable_id','=',$image->id)->where('commentable_type','=','Video')->orderBy('id','asc')->get();
			$likedcount = Like::where('likeable_id', '=', $image->id)->where('likeable_type','=','Video')->count();

		}


		$user_audios = Audio::where('user_id','=',$current_user)->get();
		foreach ($user_audios as $key => $image) {

			$user_audios[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Audio')->first();
			$user_audios[$key]->commented = Comment::where('commentable_id','=',$image->id)->where('commentable_type','=','Audio')->orderBy('id','asc')->get();
			
		}
		$rewards = Achievement::where('user_id','=',$current_user)->get();

		$events = Promoterevent::where('user_id','=',$current_user)->get();
		foreach ($events as $key => $eventsvalue) {

			$events[$key]->liked = Like::where('user_id','=',$eventsvalue->user_id)->where('likeable_id', '=', $eventsvalue->id)->where('likeable_type','=','Promoterevent')->first();
			$events[$key]->counted = Like::where('likeable_id','=',$eventsvalue->id)->count();
		}
		// recentactivity code 
		
		$news_feeds = Newsfeed::where('user_id','=',$current_user)->get();
		foreach($news_feeds as $newsFeed)
		{
			
			$userAvatar = Sentry::findUserById($newsFeed->user_id)->profileimage;
			$userName = Sentry::findUserById($newsFeed->user_id)->name;
			$postedOn = $newsFeed->created_at->diffForHumans();
			$postmodel = $newsFeed->newsfeedable_type;
			$newsfeedid = $newsFeed->id;
			$postid = $newsFeed->newsfeedable_id;

			
			if($postmodel == 'Picture')
			{
				$postedimage = Picture::find($newsFeed->newsfeedable_id);
				$postedImage = $postedimage->picturename;
				$postedTitle = $postedimage->picturetitle;
				$postedDesc = $postedimage->picturedescription;
			}
			elseif($postmodel == 'Video')
			{
				$postedimage = Video::find($newsFeed->newsfeedable_id);
				$postedImage = $postedimage->videosrc;
				$postedTitle = $postedimage->videotitle;
				$postedDesc = $postedimage->videodescription;
			}
			elseif($postmodel == 'Audio')
			{
				$postedimage = Audio::find($newsFeed->newsfeedable_id);
				$postedImage = $postedimage->audiosrc;
				$postedTitle = $postedimage->audiotitle;
				$postedDesc = $postedimage->videodescription;
			}
			
			$newfeed = new stdClass;
			$newfeed->postid = $postid;
			$newfeed->userpicture = $userAvatar;
			$newfeed->model = $postmodel;
			$newfeed->username = $userName;
			$newfeed->postedon = $postedOn;
			$newfeed->postedimage = $postedImage;
			$newfeed->postedtitle = $postedTitle;
			$newfeed->posteddesc = $postedDesc;
			$newfeed->id = $newsfeedid;
			
			$newarray[] = json_decode(json_encode($newfeed));
			foreach ($newarray as $key => $image) {
				
				$newarray[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->postid)->where('likeable_type','=',$image->model)->first();
				$newarray[$key]->commented = Comment::where('commentable_id','=',$image->postid)->where('commentable_type','=',$image->model)->orderBy('id','desc')->take(2)->get()->reverse();
				$newarray[$key]->outcommented = Comment::where('commentable_id','=',$image->postid)->where('commentable_type','=',$image->model)->orderBy('id','desc')->get()->reverse();
					
			}
			
			

		}
		if(!isset($newarray)){
			$newarray = 'NULL';
		}


		
		return View::make('protected.standardUser.user_page_1')
					->with('active_user',$active_user)
					->with('albums',$albums)
					->with('articles',$articles)
					->with('scouts',$scouts)
					->with('scoutadds',$scoutadds)
					->with('aud_review',$aud_review)
					->with('performances',$performances)
					->with('abouts',$abouts)
					->with('all_albums',$all_albums)
					->with('user_videos',$user_videos)
					->with('rewards',$rewards)
					->with('user_audios',$user_audios)
					->with('events',$events)
					->with('newarray',$newarray);
	}	
	public function getUserProtecte($id)
	{
		$allalbum = Album::find($id);
		$current_user = Sentry::getUser()->id;
		$active_user = User::find($current_user);
		$albums = ['0' => 'default'] + Album::where('user_id','=',Sentry::getUser()->id)->lists('albumname','id');
		$articles = Blog::where('user_id','=',$current_user)->get();
		$scouts = Scout::where('user_id','=',$current_user)->get();
		$scoutadds =  Scoutadd::where('user_id','=',$current_user)->where('applied','=','1')->get();
		
		foreach ($scoutadds as $key => $make) 
		{
			
			$scoutadds[$key]->scouted = Scout::where('id','=',$make->scout_id)->get();
			
		}
		
		
		$aud_review = Audiencereview::where('user_id','=',$current_user)->get();
		$performances = Performance::where('user_id','=',$current_user)->get();
		$abouts = Profile::where('user_id','=',$current_user)->first();

		$album_images = Picture::where('album_id','=',$id)->get();

		//foreach ($album_images as $key => $image) $album_images[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Picture')->first();
		foreach ($album_images as $key => $image) {

			$album_images[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Picture')->first();
			

			$album_images[$key]->commented = Comment::where('commentable_id','=',$image->id)->where('commentable_type','=','Picture')->orderBy('id','asc')->get();
			
			# code...
			

		}

		
		


		
		return View::make('protected.standardUser.user_page_2')
					->with('active_user',$active_user)
					->with('albums',$albums)
					->with('articles',$articles)
					->with('scouts',$scouts)
					->with('scoutadds',$scoutadds)
					->with('aud_review',$aud_review)
					->with('performances',$performances)
					->with('abouts',$abouts)
					->with('album_images',$album_images);
	}	


}