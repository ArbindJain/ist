
<?php

class Feed extends Eloquent{

	protected $table = 'feeds';
	

	public function feedable(){
		return $this->morphTo();
	}
}
