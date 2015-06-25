<?php

class PromoterEventsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$events = Promoterevent::all();
		return View::make('promoterevents.index')
					->with('events',$events);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('promoterevents.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$galleryimage = Input::file('posterimage');
		$sha1 = sha1($galleryimage->getClientOriginalName());
		$filename = date('Y-m-d-H:i:s')."-".rand(1,100).".".$sha1.".";

		$path = public_path('scoutagreement/'. $filename);
		Image::make($galleryimage->getRealPath())
				->resize(400,400)
				->save($path);
		$product = 'postergallery/'. $filename;
		$event = new Promoterevent();
		$event->eventname = Input::get('eventname');
		$event->eventdatetime = Input::get('eventdatetime');
		$event->eventduration = Input::get('eventduration');
		$event->location = Input::get('location');
		$event->details = Input::get('details');	
		$event->art =Input::get('art');
		$event->collection =Input::get('collection');
		$event->cooking =Input::get('cooking');
		$event->dance =Input::get('dance');
		$event->fashion =Input::get('fashion');
		$event->moviesandtheatre =Input::get('moviesandtheatre');
		$event->music =Input::get('music');	
		$event->sports =Input::get('sports');	
		$event->unordinary =Input::get('unordinary');
		$event->wanderer =Input::get('wanderer');
		$event->poster = $product;
		$event->user_id = Sentry::getUser()->id;
		$event->save();




			
            // redirect To astral...
            return Redirect::to('events');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	   // $eventdata = Promoterevent::find($id);
	   // return View::make('promoterevents.show')
	   // 			->with('eventdata',$eventdata);
	   	$scoutview = Promoterevent::find($id);
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
		

		return View::make('promoterevents.show')
			->with('scoutview',$scoutview)
			->with('image_list',$image_list)
			->with('video_list',$video_list)
			->with('audio_list',$audio_list)
			->with('liked',$liked)
			->with('likecount',$likecount);
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
		$event = Promoterevent::find($id);
		return View::make('promoterevents.edit')
					->with('event',$event);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$event = Promoterevent::find($id);
		if(Input::file('posterimage') == 0)
		{
			$event->eventname = Input::get('eventname');
			$event->eventdatetime = Input::get('eventdatetime');
			$event->eventduration = Input::get('eventduration');
			$event->location = Input::get('location');
			$event->details = Input::get('details');
			$event->art =Input::get('art');
			$event->collection =Input::get('collection');
			$event->cooking =Input::get('cooking');
			$event->dance =Input::get('dance');
			$event->fashion =Input::get('fashion');
			$event->moviesandtheatre =Input::get('moviesandtheatre');
			$event->music =Input::get('music');	
			$event->sports =Input::get('sports');	
			$event->unordinary =Input::get('unordinary');
			$event->wanderer =Input::get('wanderer');	
			$event->save();
			
		}
		else {
			$galleryimage = Input::file('posterimage');
			$sha1 = sha1($galleryimage->getClientOriginalName());
			$filename = date('Y-m-d-H:i:s')."-".rand(1,100).".".$sha1.".";

		$path = public_path('scoutagreement/'. $filename);
			Image::make($galleryimage->getRealPath())
					->resize(300,300)
					->save($path);
			$product = 'postergallery/'. $filename;
			$event->eventname = Input::get('eventname');
			$event->eventdatetime = Input::get('eventdatetime');
			$event->eventduration = Input::get('eventduration');
			$event->location = Input::get('location');
			$event->details = Input::get('details');
			$event->art =Input::get('art');
			$event->collection =Input::get('collection');
			$event->cooking =Input::get('cooking');
			$event->dance =Input::get('dance');
			$event->fashion =Input::get('fashion');
			$event->moviesandtheatre =Input::get('moviesandtheatre');
			$event->music =Input::get('music');	
			$event->sports =Input::get('sports');	
			$event->unordinary =Input::get('unordinary');
			$event->wanderer =Input::get('wanderer');
			$event->poster = $product;
			$event->save();
			
		}
		return Redirect::route('events.edit', $event->id)->withFlashMessage('event and poster data has been updated successfully!');
		
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
		$eventdata = Promoterevent::find($id);
		$eventdata->delete();
		return Rxedirect::to('events');
	}


}
