<?php

class CommentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
 
	

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Storing Data using Polymorphic Relations
		//Amazing method better than creating PIVOT Table(always use it!!)
		$model = Input::get('model');
		$currentuser = Sentry::getUser()->id;
		$blogseries = Input::get('blog_id');
		$users = $model::find($blogseries);

		$user = new Comment();
		$user->comment = Input::get('commentbody');
		$user->user_id =Sentry::getUser()->id;
		$users->comments()->save($user);
		$newsfeed_count = Newsfeed::where('newsfeedable_id','=',$blogseries)->where('newsfeedable_type','=',$model)->first();
		$newsfeed_count->count = $newsfeed_count->count + 1;
		$newsfeed_count->save();
		$postedtime = $user->created_at->diffForHumans();
		$owner = Sentry::findUserById($user->user_id)->name;
		$commenttext = $user->comment;
		$commentid = $user->id;
		$commentuserpic = Sentry::findUserById($user->user_id)->profileimage;

		$commentdata = array(
				'created_at' => $postedtime,
				'user_id' => $owner,
				'comment' => $commenttext,
				'comment_id' => $commentid,
				'view_id' => $blogseries,
				'user_image'=> $commentuserpic,
			);
		
		return Response::json($commentdata);
		





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
		//
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

		$comment = Comment::find($id);
		$comment->delete();

		return Redirect::back();
			}


}
