<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotCandidatesEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_candidates_events', function(Blueprint $table)
		{
			$table->integer('candidate_id');
			$table->integer('event_id')->index('fk_pivot_candidates_events');
			$table->primary(['candidate_id','event_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_candidates_events');
	}

}
