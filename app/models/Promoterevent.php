  <?php


class Promoterevent extends Eloquent
    {
    		protected $table = 'promoterevents';

    		
		    public function user()
		    {

		    	return $this->belongsTo('User');
		    }

		   

	}