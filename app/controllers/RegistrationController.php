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
		$input = Input::only('email', 'password', 'password_confirmation', 'name','dob');

		$this->registrationForm->validate($input);

		$input = Input::only('email', 'password','name','dob','terms');
		$input = array_add($input, 'activated', true);

		$user = $this->user->create($input);

		// Find the group using the group name
    	$usersGroup = Sentry::findGroupByName($which_group);

    	// Assign the group to the user
    	$user->addGroup($usersGroup);

		return Redirect::to('login')->withFlashMessage('User Successfully Created!');
	}



}