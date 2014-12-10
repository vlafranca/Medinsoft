<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTrainingCentersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('training_centers', function(Blueprint $table)
		{
			$table->foreign('user_id', 'training_centers_ibfk_1')->references('user_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('training_centers', function(Blueprint $table)
		{
			$table->dropForeign('training_centers_ibfk_1');
		});
	}

}
