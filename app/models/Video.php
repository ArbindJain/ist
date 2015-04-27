<?php

class Video extends Eloquent {
	
	protected $table = 'videos';

	// Table relationship
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