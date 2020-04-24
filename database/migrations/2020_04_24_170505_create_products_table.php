<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable()->unique('name');
			$table->integer('id_categories')->unsigned()->nullable()->index('products_id_categories_foreign');
			$table->integer('id_objects')->unsigned()->nullable()->index('id_objects');
			$table->text('description', 16777215)->nullable();
			$table->float('unit_price', 20)->nullable();
			$table->float('promotion_price', 20)->nullable()->default(0.00);
			$table->integer('amount')->nullable();
			$table->string('image1')->nullable();
			$table->string('image2')->nullable();
			$table->string('image3')->nullable();
			$table->string('image4')->nullable();
			$table->boolean('highlight')->default(0);
			$table->boolean('new')->default(0);
			$table->integer('view_count')->default(0);
			$table->string('slug')->nullable();
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
		Schema::drop('products');
	}

}
