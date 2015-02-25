<?php

use basicAuth\Repo\UserRepositoryInterface;
use basicAuth\formValidation\UsersEditForm;

class PromotersController extends \BaseController {

	/**
	 * @var $user
	 */
	protected $user;

	/**
	* @var usersEditForm
	*/
	protected $usersEditForm;

	/**
	* @param UsersEditForm $usersEditForm
	*/
	function __construct(UserRepositoryInterface $user, UsersEditForm $usersEditForm)
	{
		$this->user = $user;
		$this->usersEditForm = $usersEditForm;

	}

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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		// $user = User::findOrFail($id);
		$user = $this->user->find($id);
		$about = Profile::where('user_id','=',$id)->first();

		return View::make('promoter.show')->withUser($user)->with('about',$about);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// $user = User::findOrFail($id);
		$user = $this->user->find($id);

		return View::make('promoter.edit')->withUser($user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// $user = User::findOrFail($id);
		$user = $this->user->find($id);
		// depending upon profile updation we update the profile with or without profile image fill
		if ( Input::file('profileimage') == 0 )
		{
			// save only details without images
			$input = Input::only('email', 'name' ,'title', 'dob' , 'gender' , 'contact' , 'country' , 'city' , 'email' , 'art' ,  'collection' ,'cooking','dance' , 'fashion' , 'moviesandtheatre' , 'music' , 'sports' , 'unordinary','wanderer');
			$this->usersEditForm->excludeUserId($user->id)->validate($input);
			$user->fill($input)->save();
			return Redirect::route('promoter.edit', $user->id)->withFlashMessage('User has been updated successfully!');
		}
		else
		{	
			//processes image and changes the file size name and ratio and store it in local folder profileimages
			if($image = Input::file('profileimage'))
				{
					$filename = date('Y-m-d-H:i:s')."-".rand(1,100);
					Image::make($image->getRealPath())
								->resize(200,200)
								->save('public/profileimages/'. $filename);
					$product = 'profileimages/'. $filename;
				}
				else
				{
					$product= 'profileimages/default.jpg';
				}
				//once image is processed we update the image along with option to update other information also
			$input = Input::only('email', 'name' ,'title', 'dob' , 'gender' , 'contact' , 'country' , 'city' , 'email' , 'art' ,  'collection' ,'cooking','dance' , 'fashion' , 'moviesandtheatre' , 'music' , 'sports' , 'unordinary','wanderer');
			$input = array_add($input, 'profileimage', $product);
			$this->usersEditForm->excludeUserId($user->id)->validate($input);
			$user->fill($input)->save();
			$user->save();
			return Redirect::route('promoter.edit', $user->id)->withFlashMessage('User (and Image) has been updated successfully!');
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
		//
	}


}
