<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSizeProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('size_products', function(Blueprint $table)
		{
			$table->foreign('id_size', 'size_products_ibfk_1')->references('id')->on('size')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_products', 'size_products_ibfk_2')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('size_products', function(Blueprint $table)
		{
			$table->dropForeign('size_products_ibfk_1');
			$table->dropForeign('size_products_ibfk_2');
		});
	}

}
