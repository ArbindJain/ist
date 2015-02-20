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
		
		$followings = null;
		if(Sentry::check()){
		$followings = (Follower::where('user_id','=', $userprofile->id)->where('following_id', '=',Sentry::getUser()->id)->first()); 
		}
		$followingcount = Follower::where('following_id','=',$userprofile->id)->count();
		$followedbycount = Follower::where('user_id','=',$userprofile->id)->count();
		

		return View::make('pages.profile')
		->with('userprofile',$userprofile)
		->with('followings',$followings)
		->with('followingcount',$followingcount)
		->with('followedbycount',$followedbycount);
		
		
		

	}
	

}