<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlideTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slide', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->integer('id_categories')->unsigned()->nullable()->index('id_categories3');
			$table->integer('id_objects')->unsigned()->nullable()->index('id_objects3');
			$table->text('description', 65535)->nullable();
			$table->string('link')->nullable();
			$table->string('image')->nullable();
			$table->integer('discount')->nullable()->default(0);
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
		Schema::drop('slide');
	}
}