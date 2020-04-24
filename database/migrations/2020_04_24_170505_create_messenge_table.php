<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessengeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messenge', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('from_user')->unsigned()->index('form_user');
			$table->integer('to_user')->unsigned()->index('to_user');
			$table->string('title');
			$table->text('message', 65535)->nullable();
			$table->boolean('reader')->default(0);
			$table->boolean('remove')->default(0);
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
		Schema::drop('messenge');
	}

}
