<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('audios' ,function(Blueprint $table)
			{
				$table->increments('id')->unsigned();
				$table->string('audiosrc');
				$table->string('audiotitle');
				$table->string('audiodescription');
				$table->integer('user_id')->unsigned();
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
		Schema::drop('audios');
	}

}
