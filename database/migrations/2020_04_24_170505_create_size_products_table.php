<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSizeProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('size_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_products')->unsigned()->nullable()->index('id_products');
			$table->integer('id_size')->unsigned()->nullable()->index('id_size');
			$table->integer('quantity')->default(0);
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
		Schema::drop('size_products');
	}

}
