<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageCenterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_center', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_bill')->unsigned()->nullable()->index('id_bill');
			$table->integer('id_review')->nullable()->index('id_review');
			$table->boolean('reader')->nullable()->default(0);
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
		Schema::drop('message_center');
	}

}
