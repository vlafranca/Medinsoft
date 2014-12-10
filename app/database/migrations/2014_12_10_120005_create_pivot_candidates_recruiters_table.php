<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotCandidatesRecruitersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_candidates_recruiters', function(Blueprint $table)
		{
			$table->integer('candidate_id');
			$table->integer('recruiter_id')->index('fk_pivot_candidates_recruiters');
			$table->primary(['candidate_id','recruiter_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_candidates_recruiters');
	}

}
