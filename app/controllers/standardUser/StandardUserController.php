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
		$scouts = Scout::where('user_id','=',$current_user)->get();
		$scoutadds =  Scoutadd::where('user_id','=',$current_user)->where('applied','=','1')->get();
		
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
			
			# code...
			$likedcount = Like::where('likeable_id', '=', $image->id)->where('likeable_type','=','Video')->count();

		}


		$user_audios = Audio::where('user_id','=',$current_user)->get();
		foreach ($user_audios as $key => $image) {


			$user_audios[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Video')->first();
			

			$user_audios[$key]->commented = Comment::where('commentable_id','=',$image->id)->where('commentable_type','=','Video')->orderBy('id','asc')->get();
			
			# code...
			

		}
		$rewards = Achievement::where('user_id','=',$current_user)->get();
		/*
		echo "<pre>";
		var_dump($rewards);
		echo "</pre>";*/
		


		
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
					->with('user_audios',$user_audios);
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