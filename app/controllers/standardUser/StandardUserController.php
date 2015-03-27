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
		$albums = ['' => ''] + Album::where('user_id','=',Sentry::getUser()->id)->lists('albumname','id');
		$articles = Blog::where('user_id','=',$current_user)->get();
		$scouts = Scout::where('user_id','=',$current_user)->get();

		
		
		return View::make('protected.standardUser.user_page_1')
					->with('active_user',$active_user)
					->with('albums',$albums)
					->with('articles',$articles)
					->with('scouts',$scouts);
	}




}