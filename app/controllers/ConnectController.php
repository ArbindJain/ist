<?php

class ConnectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$connect_status = Connect::where('connect_id','=',Sentry::getUser()->id)
								 ->where('status','=','1')
								 ->get();
		$connected_user = Connect::where('connect_id','=',Sentry::getUser()->id)
								 ->where('status','=','2')
								 ->get();
		$connected_pending = Connect::where('user_id','=',Sentry::getUser()->id)
								 ->where('status','=','1')
								 ->get();
		$connect_count = Connect::where('connect_id','=',Sentry::getUser()->id)
								->where('status','=','1')
								->get()
								->count();
		return View::make('connect.connect')
				   ->with('connect_status',$connect_status)
				   ->with('connected_user',$connected_user)
				   ->with('connected_pending',$connected_pending)
				   ->with('connect_count',$connect_count);
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

		$connect = new Connect();
		$connect->user_id = Sentry::getUser()->id;
		$connect->connect_id = Input::get('connect_id');
		$connect->status = '1';
		$connect->save();

		return Response::json($connect);

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
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$connect_id = Input::get('id');
		$connect = Connect::find($connect_id);
		$connect->delete();

		return Response::json();
	}

	public function acceptconnect(){
		$connect_id = Input::get('connect_id');
		$connect = Connect::find($connect_id);
		$connect->status = Input::get('status');
		$connect->save();

		return Response::json();

	}

	


}
