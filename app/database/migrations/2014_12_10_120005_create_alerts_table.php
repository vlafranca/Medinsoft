<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alerts', function(Blueprint $table)
		{
			$table->integer('alert_id', true);
			$table->string('cat_name', 85)->nullable()->index('fk_pivot_alerts_categories');
			$table->string('tag_name', 45)->nullable()->index('fk_pivot_alerts_tags');
			$table->string('alert_name', 75)->nullable();
			$table->text('description')->nullable();
			$table->date('remember_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alerts');
	}

}
