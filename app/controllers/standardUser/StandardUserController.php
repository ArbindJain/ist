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
		return View::make('protected.standardUser.user_page_1')
					->with('active_user',$active_user);
	}




}