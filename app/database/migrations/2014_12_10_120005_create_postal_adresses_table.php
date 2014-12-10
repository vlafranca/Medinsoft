<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostalAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postal_adresses', function(Blueprint $table)
		{
			$table->integer('adress_id', true);
			$table->integer('user_id')->index('user_id');
			$table->text('address')->nullable();
			$table->string('postal_code', 5)->nullable();
			$table->string('city', 75)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('postal_adresses');
	}

}
