
<?php

class Newsfeed extends Eloquent{

	protected $table = 'newsfeeds';
	
	
	public function newsfeedable(){
		return $this->morphTo();
	}
}
