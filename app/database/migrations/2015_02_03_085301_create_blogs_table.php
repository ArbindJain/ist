<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {

	public function up()
{
    Schema::create('blogs', function(Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->text('body');
        $table->text('bodysnap');
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
    Schema::drop('blogs');
}

}
