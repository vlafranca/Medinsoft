<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGroupsPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('groups_permissions', function(Blueprint $table)
		{
			$table->foreign('group', 'groups_permissions_ibfk_1')->references('group')->on('groups')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('groups_permissions', function(Blueprint $table)
		{
			$table->dropForeign('groups_permissions_ibfk_1');
		});
	}

}
