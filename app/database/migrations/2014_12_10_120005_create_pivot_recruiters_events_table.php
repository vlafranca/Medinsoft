<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotRecruitersEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_recruiters_events', function(Blueprint $table)
		{
			$table->integer('recruiter_id');
			$table->integer('event_id')->index('fk_pivot_recruiters_events');
			$table->string('type', 50)->nullable();
			$table->primary(['recruiter_id','event_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_recruiters_events');
	}

}
