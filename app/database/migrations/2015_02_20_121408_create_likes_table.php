<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
		public function up()
	{
		Schema::create('likes', function(Blueprint $table) {
        $table->integer('user_id')->unsigned();
        $table->integer('likeable_id');
        $table->string('likeable_type');
        $table->timestamps();
        $table->primary(array('likeable_id', 'user_id'));
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
    Schema::drop('likes');
}

}
