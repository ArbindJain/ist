<?php

use basicAuth\Repo\UserRepositoryInterface;
use basicAuth\formValidation\RegistrationForm;

class RegistrationController extends \BaseController {

	/**
	 * @var $user
	 */
	protected $user;

	/**
	 * @var RegistrationForm
	 */
	private $registrationForm;

	function __construct(UserRepositoryInterface $user, RegistrationForm $registrationForm)
	{
		$this->user = $user;
		$this->registrationForm = $registrationForm;
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$which_group = Input::get('group');
		if($which_group == 'Stars'){
			$input = Input::only('email', 'password', 'password_confirmation', 'name','gender');

			$this->registrationForm->validate($input);

			$input = Input::only('email', 'password','name','terms','gender','contact','art','cooking','dance','fashion','moviesandtheatre','music','sports','unordinary','wanderer');
			$day = Input::get('day');
			$month = Input::get('month');
			$year = Input::get('year');
			$dob = $day.$month.$year;	
			$input = array_add($input,'dob',$dob);
			$product= 'profileimages/default.jpg';
			$input = array_add($input, 'profileimage', $product);
		}
		elseif ($which_group == 'Audiences') {
			$input = Input::only('email', 'password', 'password_confirmation', 'name','gender');

			$this->registrationForm->validate($input);

			$input = Input::only('email', 'password','name','terms','gender','contact');
			$day = Input::get('day');
			$month = Input::get('month');
			$year = Input::get('year');
			$dob = $day.$month.$year;	
			$input = array_add($input,'dob',$dob);
			$product= 'profileimages/default.jpg';
			$input = array_add($input, 'profileimage', $product);
		}
		elseif ($which_group == 'Promoters') {
			$input = Input::only('email', 'password', 'password_confirmation', 'name','contact','address','city','country');

			$this->registrationForm->validate($input);

			$input = Input::only('email', 'password','name','terms','contact','address','city','country');
			$day = Input::get('day');
			$month = Input::get('month');
			$year = Input::get('year');
			$dob = $day.'-'.$month.'-'.$year;	
			$input = array_add($input,'dob',$dob);
			$product= 'profileimages/default.jpg';
			$input = array_add($input, 'profileimage', $product);
		}
		
		$input = array_add($input, 'activated', true);

		$user = $this->user->create($input);

		// Find the group using the group name
    	$usersGroup = Sentry::findGroupByName($which_group);

    	// Assign the group to the user
    	$user->addGroup($usersGroup);
    	$about = new Profile();
    	$about->user_id = $user->id ;
    	$about->save();

		return Redirect::to('login')->withFlashMessage('User Successfully Created!');
	}



}