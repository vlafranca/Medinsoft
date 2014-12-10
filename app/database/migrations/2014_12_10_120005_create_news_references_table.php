<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsReferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news_references', function(Blueprint $table)
		{
			$table->integer('attr_id', true);
			$table->integer('news_id')->index('news_id');
			$table->string('attr_type', 10)->nullable();
			$table->string('attr_value', 5)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news_references');
	}

}
