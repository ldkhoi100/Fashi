<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSlideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('slide', function(Blueprint $table)
		{
			$table->foreign('id_categories', 'slide_ibfk_1')->references('id')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_objects', 'slide_ibfk_2')->references('id')->on('objects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('slide', function(Blueprint $table)
		{
			$table->dropForeign('slide_ibfk_1');
			$table->dropForeign('slide_ibfk_2');
		});
	}

}
