<?php

class BlogsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$blogs = Blog::all();
		return View::make('blog.index')
			->with('blogs',$blogs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('blog.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$blogs = new Blog();
		$blogs->title = Input::get('title');
		$blogs->body =  Input::get('bodydesc');
		$blogs->user_id = Sentry::getUser()->id;
		$blogs->save();
		 return Redirect::to('blog');


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//show the blog
		$blog = Blog::find($id);
			return View::make('blog.show')
					->with('blog',$blog);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Responseorking directory.
warning: CRLF will be replaced by LF in public/pack
	 */
	public function edit($id)
	{
			$blog = Blog::find($id);
			return View::make('blog.edit')
					->with('blog',$blog);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$blog = Blog::find($id);
		$blog->title = Input::get('title');
		$blog->body = Input::get('bodydesc');
		$blog->save();
		return Redirect::route('blog.index')
						->withFlashMessage('Updated successfully!');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$blog = Blog::find($id);
		$blog->delete();

		return Redirect::to('blog');
	}


}
