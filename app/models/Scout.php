<?php

use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Scout extends Eloquent implements TaggableInterface
    {
    		use TaggableTrait;
    		protected $table = 'scouts';

    		// relationship between user and album
		    public function user()
		    {

		    	return $this->belongTo('User');
		    }
		    
		    public function likeable()

            {
                
                return $this->morphMany('Like','likeable');
            
            }
		    

	}