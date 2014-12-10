<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRecruitersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('recruiters', function(Blueprint $table)
		{
			$table->foreign('enterprise_type', 'recruiters_ibfk_2')->references('enterprise_type')->on('enterprise_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'recruiters_ibfk_1')->references('user_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('recruiters', function(Blueprint $table)
		{
			$table->dropForeign('recruiters_ibfk_2');
			$table->dropForeign('recruiters_ibfk_1');
		});
	}

}
