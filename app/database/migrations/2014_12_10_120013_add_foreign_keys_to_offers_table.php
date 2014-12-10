<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('offers', function(Blueprint $table)
		{
			$table->foreign('recruiter_id', 'fk_recruiters_offers')->references('recruiter_id')->on('recruiters')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('cat_name', 'fk_offers_categories')->references('cat_name')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('experience_name', 'fk_offers_experiences')->references('experience_name')->on('experiences')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('offers', function(Blueprint $table)
		{
			$table->dropForeign('fk_recruiters_offers');
			$table->dropForeign('fk_offers_categories');
			$table->dropForeign('fk_offers_experiences');
		});
	}

}
