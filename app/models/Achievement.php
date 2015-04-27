<?php


class Achievement extends Eloquent
    {
    		protected $table = 'achievements';

		    public function user()
		    {

		    	return $this->belongsTo('User');
		    }

	}