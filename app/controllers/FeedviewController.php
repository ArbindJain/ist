<?php

class FeedviewController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /feedview
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Input::get('id');
		$model = Input::get('model');

		$feedview = $model::find($id);
		if($model == 'Picture'){
			$feedsrc = $feedview->picturename;
		}
		elseif ($model == 'Video') {
			
			$feedsrc = $feedview->videosrc;
		}
		elseif($model == 'Audio'){

			$feedsrc = $feedview->audiosrc;
		}

		return Response::json($feedsrc);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /feedview/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /feedview
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /feedview/{id}
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
	 * GET /feedview/{id}/edit
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
	 * PUT /feedview/{id}
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
	 * DELETE /feedview/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}