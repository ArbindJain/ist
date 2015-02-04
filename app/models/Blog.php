<?php


class Blog extends Eloquent
    {
    		protected $table = 'blogs';

		    public function album()
		    {

		    	return $this->belongsTo('User');
		    }
		   

	}