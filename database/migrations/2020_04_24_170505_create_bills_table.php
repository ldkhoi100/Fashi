<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bills', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_customer')->unsigned()->nullable()->index('bills_id_customer_foreign');
			$table->timestamp('date_order')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->float('total', 20)->nullable();
			$table->string('payment');
			$table->boolean('pay_money')->nullable()->default(0);
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
		Schema::drop('bills');
	}

}
