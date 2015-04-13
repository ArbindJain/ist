<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoutaddsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scoutadds', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->integer('scout_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('audio');
			$table->string('video');
			$table->string('image');
			$table->string('applied')->nullable();
			$table->string('shortlist')->nullable();
			$table->string('selected')->nullable();
			$table->timestamps();
			$table->foreign('scout_id')->references('id')->on('scouts')->onDelete('CASCADE')->onUpdate('CASCADE');
        	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scoutadds');
	}

}
