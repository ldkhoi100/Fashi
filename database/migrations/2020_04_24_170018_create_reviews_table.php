<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function (Blueprint $table) {
			$table->integer('id', true);
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('comment')->nullable();
			$table->integer('rating')->nullable();
			$table->integer('id_products')->unsigned()->nullable()->index('id_products2');
			$table->string('user_created')->nullable();
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
		Schema::drop('reviews');
	}
}