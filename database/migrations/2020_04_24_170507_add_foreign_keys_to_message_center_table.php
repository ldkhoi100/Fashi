<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMessageCenterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('message_center', function(Blueprint $table)
		{
			$table->foreign('id_bill', 'message_center_ibfk_1')->references('id')->on('bills')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_review', 'message_center_ibfk_2')->references('id')->on('reviews')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('message_center', function(Blueprint $table)
		{
			$table->dropForeign('message_center_ibfk_1');
			$table->dropForeign('message_center_ibfk_2');
		});
	}

}
