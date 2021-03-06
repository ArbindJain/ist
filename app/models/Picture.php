<?php

use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Picture extends Eloquent implements TaggableInterface
    {
            use TaggableTrait;
            
    		protected $table = 'pictures';

		    public function album()
		    {

		    	return $this->belongsTo('Album');
		    }
		    public function comments()

		    {
    			
    			return $this->morphMany('Comment','commentable');
    		
    		}
		    public function likeable()

            {
                
                return $this->morphMany('Like','likeable');
            
            }
            public function feedable()

            {
                
                return $this->morphMany('Feed','feedable');
            
            }
            public function newsfeedable()

            {
                
                return $this->morphMany('Newsfeed','newsfeedable');
            
            }


		   

	}