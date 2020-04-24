<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_coupon', 12)->nullable();
			$table->integer('discount')->nullable();
			$table->boolean('used')->nullable()->default(0);
			$table->string('user_used', 100)->nullable();
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
		Schema::drop('coupons');
	}

}
