<?php

class BlogsearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /blogsearch
	 *
	 * @return Response
	 */
	public function index()
	{
	
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /blogsearch/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /blogsearch
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /blogsearch/{id}
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
	 * GET /blogsearch/{id}/edit
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
	 * PUT /blogsearch/{id}
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
	 * DELETE /blogsearch/{id}
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
		$blogs = Blog::search($query)->get();
		foreach ($blogs as $key => $blogdata) {

			$blogs[$key]->liked = Like::where('user_id','=',$blogdata->user_id)->where('likeable_id', '=', $blogdata->id)->where('likeable_type','=','Blog')->first();
			# code...
			$blogs[$key]->counted = Like::where('likeable_id','=',$blogdata->id)->count();

		}
		return View::make('blog.blogsearch')
			->with('blogs',$blogs);
	}



	public function filters(){
		$query_category = Input::has('category') ? Input::get('category') : null;
		$query_date = Input::has('date') ? Input::get('date') : null;
		if($query_date == 'thisweek')
		{
			$query_date = Carbon\Carbon::now()->subDays(7)->toDateTimeString();
			
		}
		elseif ($query_date == 'thismonth') 
		{
			$query_date = Carbon\Carbon::now()->subDays(365)->toDateTimeString();
		}
		
		

		$blogs = Blog::where(function($query) use ($query_category, $query_date) {
        if($query_category)
            $query->where($query_category,'=','1');

        if($query_date)
            $query->where('created_at','>=',$query_date);

       
       
		})
		->get();
		foreach ($blogs as $key => $blogdata) {

			$blogs[$key]->liked = Like::where('user_id','=',$blogdata->user_id)->where('likeable_id', '=', $blogdata->id)->where('likeable_type','=','Blog')->first();
			# code...
			$blogs[$key]->counted = Like::where('likeable_id','=',$blogdata->id)->count();

		}

		return View::make('blog.blogfilter')
				->with('blogs', $blogs);
	}

}