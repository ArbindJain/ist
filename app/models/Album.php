<?php


class Album extends Eloquent
    {
    		protected $table = 'images';

    		// relationship between user and album
		    public function user()
		    {

		    	return $this->belongTo('User');
		    }

		    public function image()
		    {

		    	return $this->hasMany('Picture');
		    }

	}