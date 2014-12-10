<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table)
		{
			$table->integer('offer_id', true);
			$table->integer('recruiter_id')->index('fk_recruiters_offers');
			$table->string('cat_name', 85)->index('fk_offers_categories');
			$table->string('experience_name', 90)->index('fk_offers_experiences');
			$table->string('name', 50)->nullable();
			$table->text('description')->nullable();
			$table->date('publication_date')->nullable();
			$table->integer('working_time')->nullable();
			$table->char('contract_type', 50)->nullable();
			$table->integer('work_schedule')->nullable();
			$table->integer('salary')->nullable();
			$table->text('advantages')->nullable();
			$table->integer('nb_view')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offers');
	}

}
