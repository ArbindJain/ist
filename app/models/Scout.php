<?php


class Scout extends Eloquent
    {
    		protected $table = 'scouts';

    		// relationship between user and album
		    public function user()
		    {

		    	return $this->belongTo('User');
		    }
		    

		    

	}