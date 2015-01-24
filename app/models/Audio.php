<?php


class Audio extends Eloquent
    {
    		protected $table = 'audios';

    		// relationship between user and album
		    public function user()
		    {

		    	return $this->belongTo('User');
		    }

		    

	}