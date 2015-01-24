<?php

class Video extends Eloquent {
	
	protected $table = 'videos';

	// Table relationship
	public function user()
		    {

		    	return $this->belongTo('User');
		    }

		    
}