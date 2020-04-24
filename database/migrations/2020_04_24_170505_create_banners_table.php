<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_objects')->unsigned()->nullable()->unique('id_objects');
			$table->string('link')->nullable();
			$table->string('image')->nullable();
			$table->integer('position')->nullable();
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
		Schema::drop('banners');
	}

}
