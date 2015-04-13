<?php
class Audiencereview extends Eloquent
    {
    		protected $table = 'audiencereviews';

    		

    		//Review Audience belongs to user table
		    public function reviewaud()
		    {

		    	return $this->belongsTo('User');
		    }

		    
		   

	}