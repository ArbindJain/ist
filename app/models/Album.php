<?php
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Album extends Eloquent implements TaggableInterface
    {
    	use TaggableTrait;
    		protected $table = 'albums';

    		// relationship between user and album
		    public function user()
		    {

		    	return $this->belongTo('User');
		    }

		    public function image()
		    {

		    	return $this->hasMany('Picture');
		    }
		   

	}