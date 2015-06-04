<?php

class ScoutsearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /scoutsearch
	 *
	 * @return Response
	 */
	public function index()
	{
		

		

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /scoutsearch/create
	 *
	 * @return Response
	 */
	public function create()
	{
	
	}
	
	/**
	 * Store a newly created resource in storage.
	 * POST /scoutsearch
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 * GET /scoutsearch/{id}
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
	 * GET /scoutsearch/{id}/edit
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
	 * PUT /scoutsearch/{id}
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
	 * DELETE /scoutsearch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



	public function search()
	{
		

		$query = Input::get('term');
		$scouts = Scout::search($query)->get();
		foreach ($scouts as $key => $scoutvalue) {

			$scouts[$key]->liked = Like::where('user_id','=',$scoutvalue->user_id)->where('likeable_id', '=', $scoutvalue->id)->where('likeable_type','=','Scout')->first();
			
			$scouts[$key]->counted = Like::where('likeable_id','=',$scoutvalue->id)->count();
		}

		return View::make('scoutsearch.scoutsearch')
				->with('scouts', $scouts);

	}




	public function filters(){
	$query_category = Input::has('category') ? Input::get('category') : null;
		$query_venue = Input::has('event') ? Input::get('event') : null;
		$query_date = Input::has('date') ? Input::get('date') : null;
		if($query_date == 'thisweek')
		{
			$query_date = Carbon\Carbon::now()->subDays(7)->toDateTimeString();
			
		}
		elseif ($query_date == 'thismonth') 
		{
			$query_date = Carbon\Carbon::now()->subDays(365)->toDateTimeString();
		}
		
		$query_budget_max = Input::get('rightlabel');
		$query_budget_min = Input::get('leftlabel');

		$scouts = Scout::where(function($query) use ($query_category, $query_date, $query_venue , $query_budget_min , $query_budget_max) {
        if($query_category)
            $query->where($query_category,'=','1');

        if($query_date)
            $query->where('created_at','>=',$query_date);

        if($query_venue)
            $query->where('city', $query_venue);

       if($query_budget_min )
        	$query->where('renumerationmin','=',$query_budget_min);
       if($query_budget_max)
       		$query->where('renumerationmax','<=',$query_budget_max);

       
		})
		->get();
		foreach ($scouts as $key => $scoutvalue) {

			$scouts[$key]->liked = Like::where('user_id','=',$scoutvalue->user_id)->where('likeable_id', '=', $scoutvalue->id)->where('likeable_type','=','Scout')->first();
			
			$scouts[$key]->counted = Like::where('likeable_id','=',$scoutvalue->id)->count();
		}

		return View::make('scoutsearch.scoutfilter')
				->with('scouts', $scouts);
	}
	

}