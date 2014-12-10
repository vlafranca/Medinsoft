<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPivotCandidatesEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pivot_candidates_events', function(Blueprint $table)
		{
			$table->foreign('candidate_id', 'fk_pivot_candidates_events2')->references('candidate_id')->on('candidates')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('event_id', 'fk_pivot_candidates_events')->references('event_id')->on('events')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pivot_candidates_events', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_candidates_events2');
			$table->dropForeign('fk_pivot_candidates_events');
		});
	}

}
