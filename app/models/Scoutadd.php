 <?php


class Scoutadd extends Eloquent
    {
    		protected $table = 'scoutadds';

    		public function user()
		    {

		    	return $this->belongTo('User');
		    }
		    

		    

	}