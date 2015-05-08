<?php

use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Audio extends Eloquent implements TaggableInterface
    {
            use TaggableTrait;
            
    		protected $table = 'audios';

    		// relationship between user and album
		    public function user()
		    {

		    	return $this->belongTo('User');
		    }
		    public function comments()

		    {
    			
    			return $this->morphMany('Comment','commentable');
    		
    		}
		     public function likeable()

            {
                
                return $this->morphMany('Like','likeable');
            
            }

		    

	}