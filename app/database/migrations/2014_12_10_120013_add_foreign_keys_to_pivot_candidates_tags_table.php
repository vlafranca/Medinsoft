<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPivotCandidatesTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pivot_candidates_tags', function(Blueprint $table)
		{
			$table->foreign('tag_name', 'fk_pivot_candidates_tags2')->references('tag_name')->on('tags')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('candidate_id', 'fk_pivot_candidates_tags')->references('candidate_id')->on('candidates')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pivot_candidates_tags', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_candidates_tags2');
			$table->dropForeign('fk_pivot_candidates_tags');
		});
	}

}
