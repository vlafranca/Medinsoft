<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPivotRecruitersEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pivot_recruiters_events', function(Blueprint $table)
		{
			$table->foreign('recruiter_id', 'fk_pivot_recruiters_events2')->references('recruiter_id')->on('recruiters')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('event_id', 'fk_pivot_recruiters_events')->references('event_id')->on('events')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pivot_recruiters_events', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_recruiters_events2');
			$table->dropForeign('fk_pivot_recruiters_events');
		});
	}

}
