<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotAlertsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_alerts_users', function(Blueprint $table)
		{
			$table->integer('alert_id');
			$table->integer('user_id')->index('fk_pivot_alerts_users');
			$table->primary(['alert_id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_alerts_users');
	}

}
