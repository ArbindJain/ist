<?php


class BlogsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$blogs = Blog::orderBy('created_at','desc')->get();
		foreach ($blogs as $key => $blogdata) {

			$blogs[$key]->liked = Like::where('user_id','=',$blogdata->user_id)->where('likeable_id', '=', $blogdata->id)->where('likeable_type','=','Blog')->first();
			# code...
			$blogs[$key]->counted = Like::where('likeable_id','=',$blogdata->id)->count();

		}
		$sidebarblogs = Blog::orderBy('created_at','desc')->take(3)->get();
		return View::make('blog.index')
			->with('blogs',$blogs)
			->with('sidebarblogs',$sidebarblogs);
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
		$blogposter = Input::file('blogposter');
		$sha1 = sha1($blogposter->getClientOriginalName());
		$filenameblog = date('Y-m-d-H:i:s')."-".rand(1,100).".".$sha1.".";
		Image::make($blogposter->getRealPath())
				->resize(300,300)
				->save('public/blogpostergallery/'. $filenameblog);
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
		$blogs->blogposter = $filenameblog;
		$blogs->save();
		$tagdata = Input::get('blogtag');
        $lastInsertedId = $blogs->id;
       	$addtag = Blog::find($lastInsertedId);
       	$addtag->tag($tagdata);
		//save tags for the blog

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
		$commented = Comment::where('commentable_id','=',$id)->where('commentable_type','=','Blog')->orderBy('id', 'asc')->get();
		//----- Like on blog ------//
		$liked = Like::where('user_id','=',$blog->user_id)->where('likeable_id', '=', $blog->id)->where('likeable_type','=','Blog')->first();
			
		$likecount = Like::where('likeable_id','=',$blog->id)->count();

		$sidebarblogs = Blog::orderBy('created_at','desc')->take(10)->get();
		$tags = $blog->tags;
			return View::make('blog.show')
					->with('blog',$blog)
					->with('commented',$commented)
					->with('liked',$liked)
					->with('likecount',$likecount)
					->with('sidebarblogs',$sidebarblogs)
					->with('tags',$tags);

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
