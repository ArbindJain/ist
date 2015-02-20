<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration {

	 /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function($table) {
            $table->integer('user_id');
            $table->integer('following_id');
            // make user_id and following_id as a combined primary key
            $table->timestamps();
            $table->primary(array('user_id', 'following_id'));
 
        });
    }
    // on migration rollback drop the followers table
    public function down()
    {
        Schema::drop('followers');
    }
}
