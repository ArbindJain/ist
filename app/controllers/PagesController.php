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
			->with('all_albums',$all_albums);
		 
		

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
		foreach ($album_images as $key => $image) $album_images[$key]->liked = Like::where('user_id', '=', Sentry::getUser()->id)->where('likeable_id', '=', $image->id)->where('likeable_type','=','Picture')->first();
		
		
		
		
		
		return View::make('pages.test')
			->with('userprofile',$userprofile)
			->with('followings',$followings)
			->with('followingcount',$followingcount)
			->with('followedbycount',$followedbycount)
			->with('album_images',$album_images);

	}
	

}