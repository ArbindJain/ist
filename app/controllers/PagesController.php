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
		
		$all_albums = Album::where('user_id','=',$id)->with('image')->get();

		$user_videos = Video::where('user_id','=',$id)->get();
		$user_audios = Audio::where('user_id','=',$id)->get();

		//$album_art = array();

		//foreach ($all_albums as $album) $album_art[$album->id] = Picture::where('album_id', '=', $album->id)->first();
		//foreach ($album_art as $picture) if (isset($picture->id)) var_dump($picture->id);
		
		//retriving all picture id by using album id
		foreach ($all_albums as $key => $album) $all_albums[$key]->picture = Picture::where('album_id', '=', $album->id)->first();
		
		$followings = null;
		if(Sentry::check()){
		$followings = (Follower::where('user_id','=', $userprofile->id)->where('following_id', '=', Sentry::getUser()->id)->first()); 
		
		}
		$followingcount = Follower::where('following_id','=',$userprofile->id)->count();
		$followedbycount = Follower::where('user_id','=',$userprofile->id)->count();
		

		return View::make('pages.profile')
			->with('userprofile',$userprofile)
			->with('followings',$followings)
			->with('followingcount',$followingcount)
			->with('followedbycount',$followedbycount)
			->with('all_albums',$all_albums)
			->with('user_videos',$user_videos)
			->with('user_audios',$user_audios);
		 
		

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
		//foreach ($album_images as $key => $commentz) $album_images[$key]->commented = Comment::where('commentable_id','=',$commentz->id)->where('commentable_type','=','Picture')->orderBy('id','desc')->get();
			
		
		//$comments = Comment::where('commentable_id','=',$id)->orderBy('id', 'desc')->get();
		//foreach ($album_images as $key => $pic_comment) $album_images[$key]->commented =Comment::where('commentable_id','=',$pic_comment->id)->orderBy('id', 'desc')->get();
		
		
		
		
		return View::make('pages.test')
			->with('userprofile',$userprofile)
			->with('followings',$followings)
			->with('followingcount',$followingcount)
			->with('followedbycount',$followedbycount)
			->with('album_images',$album_images);

	}
	

}