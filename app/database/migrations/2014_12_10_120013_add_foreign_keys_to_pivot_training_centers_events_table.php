<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPivotTrainingCentersEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pivot_training_centers_events', function(Blueprint $table)
		{
			$table->foreign('center_id', 'fk_pivot_training_centers_events2')->references('center_id')->on('training_centers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('event_id', 'fk_pivot_training_centers_events')->references('event_id')->on('events')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pivot_training_centers_events', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_training_centers_events2');
			$table->dropForeign('fk_pivot_training_centers_events');
		});
	}

}
