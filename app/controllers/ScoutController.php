<?php

class ScoutController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$scouts = Scout::all();
		foreach ($scouts as $key => $scoutvalue) {

			$scouts[$key]->liked = Like::where('user_id','=',$scoutvalue->user_id)->where('likeable_id', '=', $scoutvalue->id)->where('likeable_type','=','Scout')->first();
			
			$scouts[$key]->counted = Like::where('likeable_id','=',$scoutvalue->id)->count();
		}

		return View::make('scout.index')
				->with('scouts', $scouts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$current_user = Sentry::getUser()->id;
		$active_user = User::find($current_user);
		return View::make('scout.create')
					->with('active_user',$active_user);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$agreementfile = Input::file('agreement');
		$sha1 = sha1($agreementfile->getClientOriginalName());
		$filename = date('Y-m-d-H:i:s')."-".rand(1,100).".".$sha1.".";
		$path = public_path('scoutagreement/'. $filename);
		Image::make($agreementfile->getRealPath())
				->resize(400,400)
				->save($path);
		$scoutposter = Input::file('scoutposter');
		$sha1 = sha1($scoutposter->getClientOriginalName());
		$filenamescout = date('Y-m-d-H:i:s')."-".rand(1,100).".".$sha1.".";
		$pathscout = public_path('scoutpostergallery/'. $filenamescout);
		Image::make($scoutposter->getRealPath())
				->resize(400,400)
				->save($pathscout);
		$agreefilename = 'scoutagreement/'.$filename;
		$scoutpostername = 'scoutpostergallery/'.$filenamescout;
		$scout = new Scout();
		$scout->scouttitle = Input::get('scouttitle');
		$scout->scoutdatetime = Input::get('scoutdatetime');

		$scout->applydatetime = Input::get('applieddatetime');
		$scout->scoutduration = Input::get('scoutduration');
		$scout->renumerationmin = Input::get('renumerationrangemin');
		$scout->renumerationmax = Input::get('renumerationrangemax');
		$scout->audiencesizemin = Input::get('audiencerangemin');
		$scout->audiencesizemax = Input::get('audiencerangemax');
		$scout->gender = Input::get('gender');
		$scout->agerangemax = Input::get('agerangemax');
		$scout->agerangemin = Input::get('agerangemin');
		$scout->art =Input::get('art');
		$scout->collection =Input::get('collection');
		$scout->cooking =Input::get('cooking');
		$scout->dance =Input::get('dance');
		$scout->fashion =Input::get('fashion');
		$scout->moviesandtheatre =Input::get('moviesandtheatre');
		$scout->music =Input::get('music');	
		$scout->sports =Input::get('sports');	
		$scout->unordinary =Input::get('unordinary');
		$scout->wanderer =Input::get('wanderer');
		$scout->skills = Input::get('skills');
		$scout->venue = Input::get('venue');
		$scout->city = Input::get('city');
		$scout->country = Input::get('country');
		$scout->scoutdescription = Input::get('scoutdescription');
		$scout->artistdescription = Input::get('artistdescription');
		$scout->agreement = $agreefilename;
		$scout->scoutposter = $scoutpostername;
		$scout->user_id = Sentry::getUser()->id;
		$scout->save();
		$tagdata = Input::get('scouttag');
        $lastInsertedId = $scout->id;
       	$addtag = Scout::find($lastInsertedId);
       	$addtag->tag($tagdata);
       	$lastInsertedId = $scout->id;
            $picturefeed = Scout::find($lastInsertedId);
            $insert_feed = new Feed();
            $insert_feed->user_id = Sentry::getUser()->id;
            $insert_feed->grouptype ='NULL';
            $insert_feed->story ='have created a scout post';
            $picturefeed->feedable()->save($insert_feed);
            //last inserted feed id
            $lastInsertedFeedId = $insert_feed->id;
            $feedread = new Readfeed();
            $feedread->feed_id = $lastInsertedFeedId;
            $feedread->save();

		return Redirect::to('userProtected#findtalent');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$scout = Scout::find($id);
		$current_user = Sentry::getUser()->id;
		$active_user = User::find($current_user);
		$applicantscout =  Scoutadd::where('scout_id','=',$scout->id)->where('applied','=','YES')->get();

		foreach ($applicantscout as $key => $applicant) 
		{
			$applicantscout[$key]->applieduser = Scout::where('id','=',$applicant->scout_id)->get();
			
		}


		$shortlistscout =  Scoutadd::where('scout_id','=',$scout->id)->where('user_id','=',Sentry::getUser()->id)->where('shortlist','=','1')->get();
		foreach ($shortlistscout as $key => $shortlisted) 
		{
			$shortlistscout[$key]->shlisted = Scout::where('id','=',$shortlisted->scout_id)->get();	

		}
		$selectedscout =  Scoutadd::where('scout_id','=',$scout->id)->where('user_id','=',Sentry::getUser()->id)->where('selected','=','1')->get();
		foreach ($selectedscout as $key => $selectlist) {

			$selectedscout[$key]->selectlist = Scout::where('id','=',$selectlist->scout_id)->get();
			
		}
		$check_selected = Scoutadd::where('user_id','=',Sentry::getUser()->id)
								  ->where('scout_id','=',$id)
								  ->where('applied','=','YES')
								  ->where('selected','=','1')
								  ->first();
		$check_shortlisted = Scoutadd::where('user_id','=',Sentry::getUser()->id)
								  ->where('scout_id','=',$id)
								  ->where('applied','=','YES')
								  ->where('shortlist','=','1')
								  ->first();
		
		return View::make('scout.show')
			->with('scout',$scout)
			->with('active_user',$active_user)
			->with('applicantscout',$applicantscout)
			->with('shortlistscout',$shortlistscout)
			->with('selectedscout',$selectedscout)
			->with('check_selected',$check_selected)
			->with('check_shortlisted',$check_shortlisted);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			
			$shortlisting = Scoutadd::find($id);

			$shortlisting->shortlist = Input::get('shortlist'); 
			$shortlisting->save();

			return Redirect::to('/');

		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function getscout($id)
	{
		$scoutview = Scout::find($id);
		$liked = Like::where('user_id','=',$scoutview->user_id)->where('likeable_id', '=', $scoutview->id)->where('likeable_type','=','Scout')->first();
			
		$likecount = Like::where('likeable_id','=',$scoutview->id)->count();

		/*$created = new Carbon\Carbon($scoutview->scoutdatetime);
		$now = Carbon\Carbon::now();
		$differenceindays = ($created->diff($now)->days < 1)
		    ? 'today'
		    : $created->diffInDays($now);*/
		//var_dump(Carbon\Carbon::createFromTimeStamp(0)->diffInDays());
		$image_list = ['' => ''] + Picture::where('user_id','=',Sentry::getUser()->id)->lists('picturetitle','picturename');
		$video_list = ['' => ''] + Video::where('user_id','=',Sentry::getUser()->id)->lists('videotitle','videosrc');
		$audio_list = ['' => ''] + Audio::where('user_id','=',Sentry::getUser()->id)->lists('audiotitle','audiosrc');
		

		return View::make('scout.showpublished')
			->with('scoutview',$scoutview)
			->with('image_list',$image_list)
			->with('video_list',$video_list)
			->with('audio_list',$audio_list)
			->with('liked',$liked)
			->with('likecount',$likecount);
			
	}
	public function getresults($id)
	{
		
		$scout = Scout::find($id);
		$current_user = Sentry::getUser()->id;
		$active_user = User::find($current_user);
		$applicantscout =  Scoutadd::where('scout_id','=',$scout->id)->where('applied','=','YES')->get();

		foreach ($applicantscout as $key => $applicant) 
		{
			$applicantscout[$key]->applieduser = Scout::where('id','=',$applicant->scout_id)->get();
			
		}


		$shortlistscout =  Scoutadd::where('scout_id','=',$scout->id)->where('user_id','=',Sentry::getUser()->id)->where('shortlist','=','1')->get();
		foreach ($shortlistscout as $key => $shortlisted) 
		{
			$shortlistscout[$key]->shlisted = Scout::where('id','=',$shortlisted->scout_id)->get();	

		}
		$selectedscout =  Scoutadd::where('scout_id','=',$scout->id)->where('user_id','=',Sentry::getUser()->id)->where('selected','=','1')->get();
		foreach ($selectedscout as $key => $selectlist) {

			$selectedscout[$key]->selectlist = Scout::where('id','=',$selectlist->scout_id)->get();
			
		}
		$check_selected = Scoutadd::where('user_id','=',Sentry::getUser()->id)
								  ->where('scout_id','=',$id)
								  ->where('applied','=','YES')
								  ->where('selected','=','1')
								  ->first();
		$check_shortlisted = Scoutadd::where('user_id','=',Sentry::getUser()->id)
								  ->where('scout_id','=',$id)
								  ->where('applied','=','YES')
								  ->where('shortlist','=','1')
								  ->first();
		
		return View::make('scout.showresults')
			->with('scout',$scout)
			->with('active_user',$active_user)
			->with('applicantscout',$applicantscout)
			->with('shortlistscout',$shortlistscout)
			->with('selectedscout',$selectedscout)
			->with('check_selected',$check_selected)
			->with('check_shortlisted',$check_shortlisted);
			
	}


}
