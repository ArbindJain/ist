  <?php


class Performance extends Eloquent
    {
    		protected $table = 'performances';

    		
		    public function performanceuser()
		    {

		    	return $this->belongsTo('User');
		    }


		   

	}