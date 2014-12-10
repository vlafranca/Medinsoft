<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersVerifiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_verifies', function(Blueprint $table)
		{
			$table->foreign('user_id', 'users_verifies_ibfk_1')->references('user_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_verifies', function(Blueprint $table)
		{
			$table->dropForeign('users_verifies_ibfk_1');
		});
	}

}
