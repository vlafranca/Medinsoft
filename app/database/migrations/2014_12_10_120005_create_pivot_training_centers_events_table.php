<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotTrainingCentersEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_training_centers_events', function(Blueprint $table)
		{
			$table->integer('center_id');
			$table->integer('event_id')->index('fk_pivot_training_centers_events');
			$table->string('type', 50)->nullable();
			$table->primary(['center_id','event_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_training_centers_events');
	}

}
