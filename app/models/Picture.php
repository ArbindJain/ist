<?php


class Picture extends Eloquent
    {
    		protected $table = 'pictures';

		    public function album()
		    {

		    	return $this->belongsTo('Album');
		    }
		    public function likeable()

            {
                
                return $this->morphMany('Like','likeable');
            
            }

		   

	}