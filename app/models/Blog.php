<?php


class Blog extends Eloquent
    {
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
		   

	}