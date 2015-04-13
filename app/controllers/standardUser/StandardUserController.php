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
		$scoutadds =  Scoutadd::where('user_id','=',$current_user)->where('applied','=','1')->get();
		
		foreach ($scoutadds as $key => $make) 
		{
			
			$scoutadds[$key]->scouted = Scout::where('id','=',$make->scout_id)->where('user_id','=',$current_user)->get();

		}
		$aud_review = Audiencereview::where('user_id','=',$current_user)->get();
		$performances = Performance::where('user_id','=',$current_user)->get();
		$abouts = Profile::where('user_id','=',$current_user)->first();

		


		
		return View::make('protected.standardUser.user_page_1')
					->with('active_user',$active_user)
					->with('albums',$albums)
					->with('articles',$articles)
					->with('scouts',$scouts)
					->with('scoutadds',$scoutadds)
					->with('aud_review',$aud_review)
					->with('performances',$performances)
					->with('abouts',$abouts);
	}	


}