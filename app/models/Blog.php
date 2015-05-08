<?php
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;


class Blog extends Eloquent implements TaggableInterface
    {
            use TaggableTrait;
            
    		protected $table = 'blogs';

    		//Relation between blog user and comments..
    		//create the realtion between the user and comments and blog and user..
    		
		    public function bloguser()
		    {

		    	return $this->belongsTo('User');
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