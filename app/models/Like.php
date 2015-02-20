<?php

class Like extends Eloquent{

	protected $table = 'likes';
	

	public function likeable(){
		return $this->morphTo();
	}
}
