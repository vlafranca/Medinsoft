<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNewsReferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('news_references', function(Blueprint $table)
		{
			$table->foreign('news_id', 'news_references_ibfk_1')->references('news_id')->on('news')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('news_references', function(Blueprint $table)
		{
			$table->dropForeign('news_references_ibfk_1');
		});
	}

}
