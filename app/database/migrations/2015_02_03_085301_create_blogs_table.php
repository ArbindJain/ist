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
    Schema::drop('blogs');
}

}
