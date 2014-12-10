<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPivotAlertsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pivot_alerts_users', function(Blueprint $table)
		{
			$table->foreign('alert_id', 'fk_pivot_alerts_users2')->references('alert_id')->on('alerts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'fk_pivot_alerts_users')->references('user_id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pivot_alerts_users', function(Blueprint $table)
		{
			$table->dropForeign('fk_pivot_alerts_users2');
			$table->dropForeign('fk_pivot_alerts_users');
		});
	}

}
