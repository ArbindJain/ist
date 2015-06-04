<?php
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;
use Nicolaslopezj\Searchable\SearchableTrait;


class Blog extends Eloquent implements TaggableInterface
    {
            use TaggableTrait;
            use SearchableTrait;

            protected $table = 'blogs';
            
            protected $searchable = [
            'columns' => [
                'title' => 10,
                'tags.name' =>10,

            ],
            'joins' => [
            'tagged' => ['tagged.taggable_id','blogs.id'],
            'tags' => ['tags.id','tagged.tag_id'],
            ],

            
        ];

            

    		//Relation between blog user and comments..
    		//create the realtion between the user and comments and blog and user..
    		
		    public function bloguser()
		    {

		    	return $this->belongsTo('User');
		    }

		    public function comments()

		    {
    			
    			return $this->morphMany('Comment','commentable');
    		
    		}
            public function likeable()

            {
                
                return $this->morphMany('Like','likeable');
            
            }
		   

	}