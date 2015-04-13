<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('performances', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('performancetext');
			$table->string('venue');
			$table->string('performancedatetime');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('performances');
	}

}
