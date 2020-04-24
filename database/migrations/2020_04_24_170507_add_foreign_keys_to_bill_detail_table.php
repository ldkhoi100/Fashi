<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBillDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bill_detail', function(Blueprint $table)
		{
			$table->foreign('id_bill')->references('id')->on('bills')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_product')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bill_detail', function(Blueprint $table)
		{
			$table->dropForeign('bill_detail_id_bill_foreign');
			$table->dropForeign('bill_detail_id_product_foreign');
		});
	}

}
