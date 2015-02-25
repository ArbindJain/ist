  <?php


class Promoterevent extends Eloquent
    {
    		protected $table = 'promoterevents';

    		// relationship between user and album
		    public function user()
		    {

		    	return $this->belongsTo('User');
		    }

		   

	}