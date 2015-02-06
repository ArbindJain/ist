<?php

class Blogcomment extends \Eloquent {

	protected $table  = 'blogcomments';

	public function comment(){

		return $this->belongsTo('Blog');
	}
	
}