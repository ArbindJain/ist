<?php


class PicturesController extends \BaseController{

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

		$pictures = Picture::all();

		//Album Model to convert into list laravel TRICKS awesome!! loved it!!
		$albums = ['null' => 'default'] + Album::where('user_id','=',Sentry::getUser()->id)->lists('albumname','id');
		$id = Sentry::getUser()->id;
		$albumss = Album::where('user_id','=',$id)->get();
		// Return the values at the end.
		return View::make('images.index')
			->with('pictures',$pictures)
			->with('albums',$albums)
			->with('albumss',$albumss);
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
		$types = array('-original.', '-thumbnail.', '-.');
// Width and height for thumb and resiged
$sizes = array( array('325', '230'), array('400', '400') );
$targetPath = public_path().'/galleryimages/';

$file = Input::file('file');
$fname = $file->getClientOriginalName();
$ext = $file->getClientOriginalExtension();
$encriptedtext =  sha1($file->getClientOriginalName());

$nameWithOutExt = str_replace('.' . $ext, '', $encriptedtext);

$original = $nameWithOutExt . array_shift($types);
$file->move($targetPath, $original); // Move the original one first
	
foreach ($types as $key => $type) {
    // Copy and move (thumb, resized)
    $newName = $nameWithOutExt . $type;
    File::copy($targetPath . $original, $targetPath . $newName);
    Image::make($targetPath . $newName)
          ->resize($sizes[$key][0], $sizes[$key][1])
          ->save($targetPath . $newName);
}

			
			$product = 'galleryimages/'.$nameWithOutExt;
				
            $pictures = new Picture();
            $pictures->picturename = $product;
            $pictures->picturetitle = Input::get('picturetitle');
            $pictures->picturedescription = Input::get('picturedescription');
            $pictures->album_id = Input::get('album');
            $pictures->user_id = Sentry::getUser()->id;
            $pictures->save();
            $picturetag = Input::get('picturetag');
            $lastInsertedId = $pictures->id;
            $picturefeed = Picture::find($lastInsertedId);
            $picturefeed->tag($picturetag);
            $pix = Picture::find($lastInsertedId);
            $tags = $pix->tags;
            foreach ($tags as $tag) {
            		DB::table('tagged')
            ->where('tag_id', $tag->id)
            ->update(array('user_id' => Sentry::getUser()->id));
            }
            
            

           /* $tagid = $picturefeed->id;
            $usertagdata = IlluminateTagged::find($tagid);
            $usertagdata->user_id = Sentry::getuser()->id;
            $usertagdata->save()*/
            // last inserted id
            $lastInsertedId = $pictures->id;
            $picturefeed = Picture::find($lastInsertedId);
            $insert_feed = new Feed();
            $insert_feed->user_id = Sentry::getUser()->id;
            $insert_feed->grouptype ='NULL';
            $insert_feed->story ='added a photo';
            $picturefeed->feedable()->save($insert_feed);
            // last inserted id
            $lastInsertedNewsId = $pictures->id;
            $pictureNewsfeed = Picture::find($lastInsertedNewsId);
            $insert_newsfeed = new Newsfeed();
            $insert_newsfeed->user_id = Sentry::getUser()->id;
            $pictureNewsfeed->newsfeedable()->save($insert_newsfeed);
            //last inserted feed id
            $lastInsertedFeedId = $insert_feed->id;
            $feedread = new Readfeed();
            $feedread->feed_id = $lastInsertedFeedId;
            $feedread->save();

            // redirect To astral...
           // return Redirect::to('imagegallery')->withFlashMessage('image successfully uploaded!');
            return Response::json($pictures);
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
		$pictures = Picture::where('album_id','=',$id)->get();
		return View::make('images/show')
				->with('pictures',$pictures);
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
		$pictures =Picture::find($id);
		return View::make('images.edit')
					->with('pictures',$pictures);
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
		$picture = Picture::find($id);
		$picture->picturetitle = Input::get('picturetitle');
		$picture->picturedescription = Input::get('picturedescription');
		$picture->save();
		return Redirect::route('imagegallery.edit', $id)->withFlashMessage('updated successfully!');
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$pictures = Picture::find($id);
		$pictures->delete();

		return Redirect::to('imagegallery'.'/'.$id);
	}


}
