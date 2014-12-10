<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alerts', function(Blueprint $table)
		{
			$table->foreign('tag_name', 'fk_pivot_alerts_tags')->references('tag_name')->on('tags')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('cat_name', 'fk_pivot_alerts_categories')->references('cat_name')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('alerts', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_alerts_tags');
			$table->dropForeign('fk_pivot_alerts_categories');
		});
	}

}
