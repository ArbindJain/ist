<?php

class Follower extends Eloquent{

	protected $table = 'followers';
	
	public function users(){
		return $this -> has_many_and_belongs_to('User');
	}
	
}
