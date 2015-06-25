<?php

use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;
use Nicolaslopezj\Searchable\SearchableTrait;

class Scout extends Eloquent implements TaggableInterface
    {
    		use SearchableTrait;
    		use TaggableTrait;


    		protected $table = 'scouts';
    		
    		protected $searchable = [
		'columns' => [
			'scouttitle' => 10,
			'tags.name' =>10,

		],
		'joins' => [
		'tagged' => ['tagged.taggable_id','scouts.id'],
		'tags' => ['tags.id','tagged.tag_id'],
 		],

		
	];



    		// relationship between user and album
		    public function user()
		    {

		    	return $this->belongTo('User');
		    }
		    
		    public function likeable()

            {
                
                return $this->morphMany('Like','likeable');
            
            }
             public function feedable()

            {
                
                return $this->morphMany('Feed','feedable');
            
            }
            public function newsfeedable()

            {
                
                return $this->morphMany('Newsfeed','newsfeedable');
            
            }
		    

	}