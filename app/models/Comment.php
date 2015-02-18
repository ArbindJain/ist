<?php

class Comment extends Eloquent{

	protected $table = 'comments';

	public function commentable(){
		return $this->morphTo();
	}
}
