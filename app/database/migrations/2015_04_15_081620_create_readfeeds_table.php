<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadfeedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('readfeeds', function(Blueprint $table)
		{
			
			$table->increments('id');
	        $table->integer('feed_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->boolean('read');
			$table->timestamps();
			$table->foreign('feed_id')->references('id')->on('feeds')->onDelete('CASCADE')->onUpdate('CASCADE');
        	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drops('readfeeds');
	}

}
