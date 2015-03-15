<?php

class FollowersController extends \BaseController {

	
public function follow(){
	$folw = Input::get('follow_id');
	$followers = new Follower();
	$followers->user_id = Input::get('follow_id');
	$followers->following_id = Sentry::getUser()->id ;
	$followers->save();
	$followings = (Follower::where('user_id','=', $folw)->where('following_id', '=', Sentry::getUser()->id)->first()); 
	return Response::json();
 
		
}


public function unfollow(){

	$userfollow_id =Input::get('userfollow_id');
	$usefoll = (Follower::where('user_id', '=', $userfollow_id)->where('following_id', '=', Sentry::getUser()->id)->delete());
	//dd($usefoll);
	return Response::json();


}





}
