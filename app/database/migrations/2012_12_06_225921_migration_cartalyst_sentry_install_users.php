<?php
/**
 * Part of the Sentry package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Sentry
 * @version    2.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Illuminate\Database\Migrations\Migration;

class MigrationCartalystSentryInstallUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->string('name')->nullable();
			$table->string('title')->nullable();
			$table->string('dob')->nullable();
			$table->string('gender')->nullable();
			$table->string('contact')->nullable();
			$table->string('country')->nullable();
			$table->string('city')->nullable();
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
			$table->string('profileimage')->nullable();
			$table->string('terms')->nullable();
			$table->text('permissions')->nullable();
			$table->boolean('activated')->default(0);
			$table->string('activation_code')->nullable();
			$table->timestamp('activated_at')->nullable();
			$table->timestamp('last_login')->nullable();
			$table->string('persist_code')->nullable();
			$table->string('reset_password_code')->nullable();
			$table->timestamps();

			// We'll need to ensure that MySQL uses the InnoDB engine to
			// support the indexes, other engines aren't affected.
			$table->engine = 'InnoDB';
			$table->unique('email');
			$table->index('activation_code');
			$table->index('reset_password_code');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
