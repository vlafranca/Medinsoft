<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecruitersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recruiters', function(Blueprint $table)
		{
			$table->integer('recruiter_id', true);
			$table->integer('user_id')->index('user_id');
			$table->string('enterprise_type', 80)->index('enterprise_type');
			$table->string('name', 50)->nullable();
			$table->date('doc')->nullable();
			$table->integer('nb_employee')->nullable();
			$table->text('description')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recruiters');
	}

}
