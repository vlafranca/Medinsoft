<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrainingCentersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training_centers', function(Blueprint $table)
		{
			$table->integer('center_id', true);
			$table->integer('user_id')->index('user_id');
			$table->text('logo')->nullable();
			$table->text('website')->nullable();
			$table->string('name', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('training_centers');
	}

}
