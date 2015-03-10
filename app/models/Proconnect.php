  <?php


class Proconnect extends Eloquent
    {
    		protected $table = 'proconnects';

    		// relationship between user and connect
		    public function user()
		    {

		    	return $this->belongTo('User');
		    }
		    
	}