<?php


class Picture extends Eloquent
    {
    		protected $table = 'pictures';

		    public function album()
		    {

		    	return $this->belongsTo('Album');
		    }
		   

	}