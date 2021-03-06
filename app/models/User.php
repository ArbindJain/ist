<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use basicAuth\Repo\UserRepositoryInterface;
use basicAuth\formValidation\UsersEditForm;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Cartalyst\Sentry\Users\Eloquent\User implements UserInterface, RemindableInterface {

	use SearchableTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $searchable = [
		'columns' => [
			'email' => 10,
			'users.name' => 10,
			'users.titlea'=> 20,
			'users.titleb'=> 20,
			'users.titlec'=> 20,
			'tags.name' =>10,
			'videos.videotitle' => 10,
			'audios.audiotitle' => 10,
			'pictures.picturetitle'=>10,


		],
		'joins' => [
		'pictures' => ['pictures.user_id','users.id'],
		'videos' => ['videos.user_id','users.id'],
		'audios' => ['audios.user_id','users.id'],
		'tagged' => ['tagged.user_id','users.id'],
		'tags' => ['tags.id','tagged.tag_id'],
 		],

		
	];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public static function boot()
    {
        self::$hasher = new Cartalyst\Sentry\Hashing\NativeHasher;
    }

    public function isCurrent()
    {
        if (!Sentry::check()) return false;

        return Sentry::getUser()->id == $this->id;
    }
    // Relation From User to All other action is defined here to user the ORM
    public function profile()
    {
    	return $this->hasOne('Profile');
    }

    public function album()
    {
    	return $this->hasMany('Album');
    }
    public function video()
    {
    	return $this->hasMany('Video');
    }
    public function audio()
    {
    	return $this->hasMany('Audio');
    }
    public function blog()
    {
    	return $this->hasMany('Blog');
    }
   
    
    public function comments()
    {
    	return $this->morphMany('Comment','commentable');
    }
   public function followers(){
		return $this -> has_many_and_belongs_to('Follower');
	}
    
    
    

}
