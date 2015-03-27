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
		$sample = e(Input::get('bodydesc'));
		$sample_text = strip_tags($sample);
		$blogs = new Blog();
		$blogs->title = Input::get('title');
		$blogs->body =  Input::get('bodydesc');
		$blogs->bodysnap = $sample_text;
		$blogs->user_id = Sentry::getUser()->id;
		$blogs->art = Input::get('art');
		$blogs->collection = Input::get('collection');
		$blogs->cooking = Input::get('cooking');
		$blogs->dance = Input::get('dance');
		$blogs->fashion = Input::get('fashion');
		$blogs->moviesandtheatre = Input::get('moviesandtheatre');
		$blogs->music = Input::get('music');
		$blogs->sports = Input::get('sports');
		$blogs->unordinary = Input::get('unordinary');
		$blogs->wanderer = Input::get('wanderer');
		$blogs->save();
		 return Redirect::to('userProtected#blog');


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
		// show the blogcomments on the basis of which post id or blog id it contains
		//$blogcomments = Blogcomment::where('blog_id','=',$id)->get();
		
		$blog = Blog::find($id);
		$commented = Comment::where('commentable_id','=',$id)->where('commentable_type','=','Blog')->orderBy('id', 'desc')->get();
		//----- Like on blog ------//
		$likecount = Like::where('likeable_id','=',$blog->id)->count();
			return View::make('blog.show')
					->with('blog',$blog)
					->with('commented',$commented)
					->with('likecount',$likecount);

				//	->with('blogcomments',$blogcomments);

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
		$blog->art = Input::get('art');
		$blog->collection = Input::get('collection');
		$blog->cooking = Input::get('cooking');
		$blog->dance = Input::get('dance');
		$blog->fashion = Input::get('fashion');
		$blog->moviesandtheatre = Input::get('moviesandtheatre');
		$blog->music = Input::get('music');
		$blog->sports = Input::get('sports');
		$blog->unordinary = Input::get('unordinary');
		$blog->wanderer = Input::get('wanderer');
		
		if($blog->user_id == Sentry::getUser()->id){
		$blog->save();
		
		return Redirect::to('userProtected#blog');

}
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
		if($blog->user_id == Sentry::getUser()->id)
		{$blog->delete();}
		

		return Redirect::to('userProtected#blog');
	}


}
