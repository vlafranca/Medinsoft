<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPivotCandidatesOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pivot_candidates_offers', function(Blueprint $table)
		{
			$table->foreign('candidate_id', 'fk_pivot_candidates_offers2')->references('candidate_id')->on('candidates')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('offer_id', 'fk_pivot_candidates_offers')->references('offer_id')->on('offers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pivot_candidates_offers', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_candidates_offers2');
			$table->dropForeign('fk_pivot_candidates_offers');
		});
	}

}
