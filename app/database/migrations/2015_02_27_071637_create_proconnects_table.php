<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProconnectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proconnects', function(Blueprint $table)
		{
			$table->integer('connect_id')->unsigned();
			$table->integer('connector_id')->unsigned();
			$table->integer('connect_status')->unsigned()->nullable();
			$table->timestamps();
			$table->primary(array('connect_id', 'connector_id'));
			$table->foreign('connect_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('proconnects');
	}

}
