<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPivotOffersTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pivot_offers_tags', function(Blueprint $table)
		{
			$table->foreign('offer_id', 'fk_pivot_offers_tags2')->references('offer_id')->on('offers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tag_name', 'fk_pivot_offers_tags')->references('tag_name')->on('tags')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pivot_offers_tags', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_offers_tags2');
			$table->dropForeign('fk_pivot_offers_tags');
		});
	}

}
