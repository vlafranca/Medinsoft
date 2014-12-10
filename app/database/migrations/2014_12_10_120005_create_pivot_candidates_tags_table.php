<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotCandidatesTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_candidates_tags', function(Blueprint $table)
		{
			$table->string('tag_name', 45);
			$table->integer('candidate_id')->index('fk_pivot_candidates_tags');
			$table->primary(['tag_name','candidate_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_candidates_tags');
	}

}
