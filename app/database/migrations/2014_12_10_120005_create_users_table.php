<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('user_id', true);
			$table->string('group', 40)->index('fk_pivot_group_user');
			$table->string('login', 40)->nullable();
			$table->string('password', 60)->nullable();
			$table->string('email', 75)->nullable();
			$table->timestamps();
			$table->string('remember_token', 60);
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
