<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotOffersTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_offers_tags', function(Blueprint $table)
		{
			$table->integer('offer_id');
			$table->string('tag_name', 45)->index('fk_pivot_offers_tags');
			$table->primary(['offer_id','tag_name']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_offers_tags');
	}

}
