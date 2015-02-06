<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogcommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
{
    Schema::create('blogcomments', function(Blueprint $table) {
        $table->increments('id');
        $table->string('comment');
        $table->integer('blog_id')->unsigned();
        $table->timestamps();
        $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('CASCADE')->onUpdate('CASCADE');
        
    });
}
 
/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::drop('blogcomments');
}


}
