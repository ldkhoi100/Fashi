<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bill_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_bill')->unsigned()->index('bill_detail_id_bill_foreign');
			$table->integer('id_product')->unsigned()->index('bill_detail_id_product_foreign');
			$table->string('name_products')->nullable();
			$table->string('size', 20)->nullable()->default('0');
			$table->integer('quantity')->nullable()->comment('Số lượng');
			$table->float('unit_price', 10)->nullable();
			$table->integer('discount')->nullable();
			$table->float('total_price', 10)->nullable();
			$table->boolean('status')->nullable()->default(0);
			$table->boolean('cancle')->nullable()->default(0);
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
		Schema::drop('bill_detail');
	}

}
