<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotCandidatesOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_candidates_offers', function(Blueprint $table)
		{
			$table->integer('candidate_id');
			$table->integer('offer_id')->index('fk_pivot_candidates_offers');
			$table->primary(['candidate_id','offer_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_candidates_offers');
	}

}
