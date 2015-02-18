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
		$user = User::find($id);
		return View::make('pages.profile')
		->with('user',$user);

	}
	

}