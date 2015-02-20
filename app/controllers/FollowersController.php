<?php

class FollowersController extends \BaseController {

	
public function follow(){

	$followers = new Follower();
	$followers->user_id = Input::get('follow_id');
	$followers->following_id = Sentry::getUser()->id ;
	$followers->save();

			

	return Redirect::back();
}


public function unfollow(){

	$userfollow_id =Input::get('userfollow_id');
	
	$usefoll = (Follower::where('user_id', '=', $userfollow_id)->where('following_id', '=', Sentry::getUser()->id)->delete());
	
	return Redirect::back();


}





}
