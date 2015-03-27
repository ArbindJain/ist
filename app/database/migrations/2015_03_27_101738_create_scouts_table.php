<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scouts', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('scouttitle');
			$table->string('scoutdatetime');
			$table->string('scoutduration');
			$table->string('renumeration');
			$table->integer('user_id')->unsigned();
			$table->string('art')->nullable();
			$table->string('collection')->nullable();
			$table->string('cooking')->nullable();
			$table->string('dance')->nullable();
			$table->string('fashion')->nullable();
			$table->string('moviesandtheatre')->nullable();
			$table->string('music')->nullable();
			$table->string('sports')->nullable();
			$table->string('unordinary')->nullable();
			$table->string('wanderer')->nullable();
			$table->string('skills');
			$table->string('venue');
			$table->string('scoutdescription');
			$table->string('artistdescription');
			$table->string('agreement')->nullable();
			$table->string('scoutposter')->nullable();
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
		Schema::drop('scouts');
	}

}
