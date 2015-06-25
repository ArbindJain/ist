<?php

class PagesController extends \BaseController {


	public function getHome()
	{
		$users = User::all();
		return View::make('pages.home')
		->with('users',$users);

	}

	public function getprofile($id)
	{
		
		$userprofile = User::find($id);
			
		$articles = Blog::where('user_id','=',$id)->get();
		foreach ($articles as $key => $blogdata) {

			$articles[$key]->liked = Like::where('user_id','=',$blogdata->user_id)->where('likeable_id', '=', $blogdata->id)->where('likeable_type','=','Blog')->first();
			# code...
			$articles[$key]->counted = Like::where('likeable_id','=',$blogdata->id)->count();

		}
		$abouts = Profile::where('user_id','=',$id)->first();
		
		$user_videos = Video::where('user_id','=',$id)->get();
		foreach ($user_videos as $key => $image) {


			$user_videos[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Video')->first();
			

			$user_videos[$key]->commented = Comment::where('commentable_id','=',$image->id)->where('commentable_type','=','Video')->orderBy('id','asc')->get();
			
		
		}

		$user_audios = Audio::where('user_id','=',$id)->get();
		foreach ($user_audios as $key => $image) {

			$user_audios[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Audio')->first();
			

			$user_audios[$key]->commented = Comment::where('commentable_id','=',$image->id)->where('commentable_type','=','Audio')->orderBy('id','asc')->get();
			

		}


		//$album_art = array();

		//foreach ($all_albums as $album) $album_art[$album->id] = Picture::where('album_id', '=', $album->id)->first();
		//foreach ($album_art as $picture) if (isset($picture->id)) var_dump($picture->id);
		
		//retriving all picture id by using album id
		$all_albums = Album::where('user_id','=',$id)->with('image')->get();
		$default_albums = Picture::where('user_id','=',$id)->where('album_id','=','0')->first();
		foreach ($all_albums as $key => $album) $all_albums[$key]->picture = Picture::where('album_id', '=', $album->id)->first();
		
		$followings = null;
		if(Sentry::check()){
		$followings = (Follower::where('user_id','=', $userprofile->id)->where('following_id', '=', Sentry::getUser()->id)->first()); 
		
		}
		$followingcount = Follower::where('following_id','=',$userprofile->id)->count();
		$followedbycount = Follower::where('user_id','=',$userprofile->id)->count();
		$reviewaudis = Audiencereview::where('user_id','=',$userprofile->id)->get();
		$rewards = Achievement::where('user_id','=',$id)->get();

		$news_feeds = Newsfeed::where('user_id','=',$id)->get();
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
		$connect_request = Connect::where('user_id','=',Sentry::getUser()->id)
							->where('connect_id','=',$id)
							->where('status','=','1')
							->first();
							
		$connected = Connect::where('user_id','=',Sentry::getUser()->id)
							->where('connect_id','=',$id)
							->where('status','=','2')
							->first();

		if(!isset($connect_request)){
			$connect_request ='NULL';
		}

		if(!isset($connected)){
			$connected ='NULL';
		}
		$connected_ornot= Connect::where('connect_id','=',$id)
								 ->where('user_id','=',Sentry::getUser()->id)
								 ->where('status','=','2')
								 ->first();



		return View::make('pages.profile')
			->with('userprofile',$userprofile)
			->with('followings',$followings)
			->with('followingcount',$followingcount)
			->with('followedbycount',$followedbycount)
			->with('all_albums',$all_albums)
			->with('user_videos',$user_videos)
			->with('user_audios',$user_audios)
			->with('reviewaudis',$reviewaudis)
			->with('articles',$articles)
			->with('abouts',$abouts)
			->with('rewards',$rewards)
			->with('newarray',$newarray)
			->with('connect_request',$connect_request)
			->with('connected',$connected)
			->with('default_albums',$default_albums);
		 
		

	}

	public function getalbum_pictures($id)
	{
		
		$allalbum = Album::find($id);
		$currentuser = $allalbum->user_id;
		$userprofile = User::find($currentuser);
		$followings = null;
		if(Sentry::check()){
		$followings = (Follower::where('user_id','=', $userprofile->id)->where('following_id', '=', Sentry::getUser()->id)->first()); 
		
		}
		$followingcount = Follower::where('following_id','=',$userprofile->id)->count();
		$followedbycount = Follower::where('user_id','=',$userprofile->id)->count();
		$album_images = Picture::where('album_id','=',$id)->get();

		//foreach ($album_images as $key => $image) $album_images[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Picture')->first();
		foreach ($album_images as $key => $image) {

			$album_images[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Picture')->first();
			

			$album_images[$key]->commented = Comment::where('commentable_id','=',$image->id)->where('commentable_type','=','Picture')->orderBy('id','asc')->get();
			
			# code...
			

		}
		$connect_request = Connect::where('user_id','=',Sentry::getUser()->id)
							->where('connect_id','=',$id)
							->where('status','=','1')
							->first();
							
		$connected = Connect::where('user_id','=',Sentry::getUser()->id)
							->where('connect_id','=',$id)
							->where('status','=','2')
							->first();

		if(!isset($connect_request)){
			$connect_request ='NULL';
		}

		if(!isset($connected)){
			$connected ='NULL';
		}
		$connected_ornot= Connect::where('connect_id','=',$id)
								 ->where('user_id','=',Sentry::getUser()->id)
								 ->where('status','=','2')
								 ->first();


		//foreach ($album_images as $key => $commentz) $album_images[$key]->commented = Comment::where('commentable_id','=',$commentz->id)->where('commentable_type','=','Picture')->orderBy('id','desc')->get();
				
		
		//$comments = Comment::where('commentable_id','=',$id)->orderBy('id', 'desc')->get();
		//foreach ($album_images as $key => $pic_comment) $album_images[$key]->commented =Comment::where('commentable_id','=',$pic_comment->id)->orderBy('id', 'desc')->get();
		
		
		
		
		return View::make('pages.test')
			->with('userprofile',$userprofile)
			->with('followings',$followings)
			->with('followingcount',$followingcount)
			->with('followedbycount',$followedbycount)
			->with('album_images',$album_images)
			->with('connect_request',$connect_request)
			->with('connected',$connected);

	}



		public function getalbumdefault_pictures($id)
	{
		
		$allalbum = Picture::find($id);
		$currentuser = $allalbum->user_id;
		$userprofile = User::find($currentuser);
		$followings = null;
		if(Sentry::check()){
		$followings = (Follower::where('user_id','=', $userprofile->id)->where('following_id', '=', Sentry::getUser()->id)->first()); 
		
		}
		$followingcount = Follower::where('following_id','=',$userprofile->id)->count();
		$followedbycount = Follower::where('user_id','=',$userprofile->id)->count();
		$album_images = Picture::where('album_id','=','0')->where('user_id','=',$currentuser)->get();

		//foreach ($album_images as $key => $image) $album_images[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Picture')->first();
		foreach ($album_images as $key => $image) {

			$album_images[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Picture')->first();
			

			$album_images[$key]->commented = Comment::where('commentable_id','=',$image->id)->where('commentable_type','=','Picture')->orderBy('id','asc')->get();
			
			# code...
			

		}
		$connect_request = Connect::where('user_id','=',Sentry::getUser()->id)
							->where('connect_id','=',$id)
							->where('status','=','1')
							->first();
							
		$connected = Connect::where('user_id','=',Sentry::getUser()->id)
							->where('connect_id','=',$id)
							->where('status','=','2')
							->first();

		if(!isset($connect_request)){
			$connect_request ='NULL';
		}

		if(!isset($connected)){
			$connected ='NULL';
		}
		$connected_ornot= Connect::where('connect_id','=',$id)
								 ->where('user_id','=',Sentry::getUser()->id)
								 ->where('status','=','2')
								 ->first();


		//foreach ($album_images as $key => $commentz) $album_images[$key]->commented = Comment::where('commentable_id','=',$commentz->id)->where('commentable_type','=','Picture')->orderBy('id','desc')->get();
				
		
		//$comments = Comment::where('commentable_id','=',$id)->orderBy('id', 'desc')->get();
		//foreach ($album_images as $key => $pic_comment) $album_images[$key]->commented =Comment::where('commentable_id','=',$pic_comment->id)->orderBy('id', 'desc')->get();
		
		
		
		
		return View::make('pages.testalbum')
			->with('userprofile',$userprofile)
			->with('followings',$followings)
			->with('followingcount',$followingcount)
			->with('followedbycount',$followedbycount)
			->with('album_images',$album_images)
			->with('connect_request',$connect_request)
			->with('connected',$connected);

	}

	public function invitefriend(){

	 return View::make('invite');
	}
	

}