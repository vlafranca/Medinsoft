<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPivotCandidatesRecruitersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pivot_candidates_recruiters', function(Blueprint $table)
		{
			$table->foreign('candidate_id', 'fk_pivot_candidates_recruiters2')->references('candidate_id')->on('candidates')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('recruiter_id', 'fk_pivot_candidates_recruiters')->references('recruiter_id')->on('recruiters')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pivot_candidates_recruiters', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_candidates_recruiters2');
			$table->dropForeign('fk_pivot_candidates_recruiters');
		});
	}

}
