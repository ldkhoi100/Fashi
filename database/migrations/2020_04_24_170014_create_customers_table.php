<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->nullable()->default('0');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('address')->nullable();
			$table->bigInteger('postcode')->nullable()->default(0);
			$table->string('city')->nullable()->default('0');
			$table->string('country')->nullable()->default('0');
			$table->bigInteger('phone')->nullable();
			$table->string('note')->nullable()->default('0');
			$table->boolean('active')->nullable()->default(0);
			$table->string('user_created')->nullable();
			$table->string('user_updated')->nullable();
			$table->string('user_deleted')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
