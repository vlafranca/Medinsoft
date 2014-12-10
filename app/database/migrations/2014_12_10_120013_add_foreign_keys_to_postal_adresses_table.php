<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPostalAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('postal_adresses', function(Blueprint $table)
		{
			$table->foreign('user_id', 'postal_adresses_ibfk_1')->references('user_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('postal_adresses', function(Blueprint $table)
		{
			$table->dropForeign('postal_adresses_ibfk_1');
		});
	}

}
