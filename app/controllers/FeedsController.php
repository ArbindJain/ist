<?php

class FeedsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
	/*	$last_id = Input::get('last_id');
		if(Input::has('read_all') && Input::get('read_all')){
			$readallfeed = Readfeed::where('user_id','=',Sentry::getUser()->id)->get();
			foreach ($readallfeed as $readall) {
				
			$readall->read = '1';
			$readall->save();

			}

		}
		
		if (isset($last_id)) 
			$feeds = DB::table('feeds')->where('id','>',$last_id)->orderBy('created_at','desc')->take(10)->get();
		else 
			$feeds = DB::table('feeds')->orderBy('created_at','desc')->take(10)->get();

		$feed_data = array();
		foreach($feeds as $feed)
		{
			$type = $feed->feedable_type;
			if($type = 'Photo' )
				{
					$icon =  'http://localhost:8000/feedicon/photo-feedicon.png';
				}
			$user = Sentry::findUserById($feed->user_id)->name;
			$profile = 'http://localhost:8000/user/'.$feed->user_id;
			$story = $feed->story;
			$requiredimage = Picture::find($feed->feedable_id); 
			$link = 'http://localhost:8000/galleryimages'.$requiredimage->picturename.'-thumbnail.jpg';
			$read_data = Readfeed::where('feed_id','=',$feed->id)->where('user_id','=',Sentry::getUser()->id)->first();
			if(!isset($read_data)){
			$read_info = new Readfeed();
			$read_info->feed_id = $feed->id;
			$read_info->user_id = Sentry::getUser()->id;
			$read_info->save();

			}
			$is_read = Readfeed::where('feed_id','=',$feed->id)->where('user_id','=',Sentry::getUser()->id)->first()->read;
			
			//echo 'loop';
 			//var_dump($is_read->read);
 			
				
			$feed_data[] = array(
				'id' => $feed->id,
				'type' => $type,
				'icon' => $icon,
				'user' => $user,
				'profile' => $profile,
				'story' => $story,
				'link' => $link,
				'read' => !!$is_read,
				'timestamp' => $feed->created_at,
				);
		}	
		$feed_data = array('okay' => true, 'notifications' => $feed_data);	
		return Response::json($feed_data);
		*/
		

	}

	public function feeds2() {
	/*	$last_id = Input::get('last_id');
		$markup = '<li data-full-unr="t"><a class="nf-slug" href="https://resultslab.ripplesresearch.com/portal/link/?&amp;goto=portal%2Ffeed%2F9%3F%26id%3D14&amp;nf_read=218"><i class="nf-ico icon-plus"></i><span class="nf-time ellipsis"><b>1</b>d</span><span class="nf-text"><b>Paramjeet Karir</b> has added a new response.</span></a></li>';
		
		$st = 0;
		$en = 8;

		if ($last_id && ($last_id >= 7) && ($last_id < 10)) {
			$st = 8;
			$en = 16;
		}

		$feed_data = [];
		for ($i = $st; $i < $en; $i++) {
			if ($last_id && ($last_id >= $i)) continue;
			$feed_data[] = [
				'id' => $i,
				'markup' => $markup,
				'unread' => ($i < 5? true:false),
			];
		}

		$feed_data = [
			'okay' => true,
			'notifications' => $feed_data,
		];
		if ($last_id) {
			$feed_data['last_id'] = $last_id;
		}
		$feed_data['unread_count'] = 10;
		$feed_data['dump'] = Input::get();
		return Response::json($feed_data);*/
		$last_id = Input::get('last_id');
		$read_all = Input::get('read_all');
		//$markup = '<li data-full-unr="t" class="xf-slug"><a class="nf-slug" href="https://resultslab.ripplesresearch.com/portal/link/?&amp;goto=portal%2Ffeed%2F9%3F%26id%3D14&amp;nf_read=218"><i class="nf-ico icon-plus"></i><span class="nf-time ellipsis"><b>1</b>d</span><span class="nf-text"><b>Paramjeet Karir</b> has added a new response.</span></a></li>';

		if(Input::has('read_all') && Input::get('read_all')){
			$readallfeed = Readfeed::where('user_id','=',Sentry::getUser()->id)->get();
			foreach ($readallfeed as $readall) {
				
			$readall->read = '1';
			$readall->save();

			}

		}
		
		if (isset($last_id)) 
			$feeds = DB::table('feeds')->where('id','>',$last_id)->orderBy('created_at','desc')->take(10)->get();
		else 
			$feeds = DB::table('feeds')->orderBy('created_at','desc')->take(10)->get();

		$feed_data = array();
		foreach($feeds as $feed)
		{
			$type = $feed->feedable_type;
			if($type == 'Picture' )
				{
					$requiredimage = Picture::find($feed->feedable_id);
					$link = url().'/'.$requiredimage->picturename.'-thumbnail.';
					
				}
			elseif ($type == 'Video') 
				{
					//$requiredimage = Video::find($feed->feedable_id);
					$link = url().'/Images/audiovideothumb.png';
				}
			elseif ($type == 'Audio')
				{
					$link = url().'/Images/audiovideothumb.png';
				}
			elseif ($type == 'Scout') {

					$link = url().'/scoutpublished/'.$feed->feedable_id;
			}


			$posteddate = \Carbon\Carbon::createFromTimeStamp(strtotime($feed->created_at))->diffForHumans();
			$user = Sentry::findUserById($feed->user_id)->name;
			$profile = url().'/user/'.$feed->user_id;
			$profileimage = url().'/'.Sentry::findUserById($feed->user_id)->profileimage;
			$story = $feed->story; 
			$read_data = Readfeed::where('feed_id','=',$feed->id)->where('user_id','=',Sentry::getUser()->id)->first();
			if(!isset($read_data)){
			$read_info = new Readfeed();
			$read_info->feed_id = $feed->id;
			$read_info->user_id = Sentry::getUser()->id;
			$read_info->save();

			}
			$is_read = Readfeed::where('feed_id','=',$feed->id)->where('user_id','=',Sentry::getUser()->id)->first()->read;
			if($type == 'Picture' )
				{
					$markup = '<li class="xf-slug">
								<div class="notif-block">
									<div class="notif-icon">
										<a href="'.$profile.'">
											<img class="" src="'.$profileimage.'">
										</a>
									</div>
									<div class="notif-text-wrapper">
										<div class="notif-user">
											<a href="'.$profile.'">'.$user.'</a>
										</div>
										<div class="notif-story">
											<p>'.$story.'</p>
										</div>
										<div class="notif-timestamp">
											<i>'.$posteddate.'</i>
										</div>
									</div>
									<div class="notif-datathumb">
										<a href="#"  class="notiftarget" data-token="" data-id="'.$feed->feedable_id.'" data-model="'.$feed->feedable_type.'">
										<img src="'.$link.'">
										</a>
									</div>
								</div>
							   </li><div class="clearfix"></div>';	
				}
			elseif ($type == 'Video') {
				$markup = '<li class="xf-slug">
							<div class="notif-block">
								<div class="notif-icon">
									<a href="'.$profile.'">
										<img class="" src="'.$profileimage.'">
									</a>
								</div>
								<div class="notif-text-wrapper">
									<div class="notif-user">
										<a href="'.$profile.'">'.$user.'</a>
									</div>
									<div class="notif-story">
										<p>'.$story.'</p>
									</div>
									<div class="notif-timestamp">
										<i>'.$posteddate.'</i>
									</div>
								</div>
								<div class="notif-datathumb">
									<a href="#" class="notiftarget" data-id="'.$feed->feedable_id.'" data-model="'.$feed->feedable_type.'">
										<img src="'.$link.'">
									</a>
								</div>
							</div>
						   </li><div class="clearfix"></div>';
				}
			elseif ($type == 'Audio'){
				$markup = '<li class="xf-slug">
							<div class="notif-block">
								<div class="notif-icon">
									<a href="'.$profile.'">
										<img class="" src="'.$profileimage.'">
									</a>
								</div>
								<div class="notif-text-wrapper">
									<div class="notif-user">
										<a href="'.$profile.'">'.$user.'</a>
									</div>
									<div class="notif-story">
										<p>'.$story.'</p>
									</div>
									<div class="notif-timestamp">
										<i>'.$posteddate.'</i>
									</div>
								</div>
								<div class="notif-datathumb">
									<a href="#" class="notiftarget"  data-id="'.$feed->feedable_id.'" data-model="'.$feed->feedable_type.'">
										<img src="'.$link.'">
									</a>
								</div>
							</div>
						   </li><div class="clearfix"></div>';

			}
			elseif ($type == 'Scout'){
				$markup = '<li class="xf-slug">
							<div class="notif-block">
								<div class="notif-icon">
									<a href="'.$profile.'">
										<img class="" src="'.$profileimage.'">
									</a>
								</div>
								<div class="notif-text-wrapper">
									<div class="notif-user">
										<a href="'.$profile.'">'.$user.'</a>
									</div>
									<div class="notif-story">
										<a href ="'.$link.'"><p>'.$story.'</p></a>
									</div>
									<div class="notif-timestamp">
										<i>'.$posteddate.'</i>
									</div>
								</div>
							</div>
						   </li><div class="clearfix"></div>';

			}
			//echo 'loop';
 			//var_dump($is_read->read);
			
			$feed_data[] = array(
				'id' => $feed->id,
				'markup' => $markup,
				'unread' => $is_read,
				);
		}	
		$feed_data = array('okay' => true, 'notifications' => $feed_data);	
		if ($last_id) {
			$feed_data['last_id'] = $last_id;
		}
		if ($read_all) {
			$feed_data['read_all'] = $read_all;
		}
		$feed_data['unread_count'] = Readfeed::where('read','=','0')->where('user_id','=',Sentry::getUser()->id)->count();
		return Response::json($feed_data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		/*$last_id = Input::get('last_id');
		$read_all = Readfeed::where('id','<','2')->take(10)->orderBy('created_at','desc')->get();
		echo '<pre>';
		var_dump($read_all);
		echo '</pre>';*/
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
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


}
