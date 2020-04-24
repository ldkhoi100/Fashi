<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('banners', function(Blueprint $table)
		{
			$table->foreign('id_objects', 'banners_ibfk_1')->references('id')->on('objects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('banners', function(Blueprint $table)
		{
			$table->dropForeign('banners_ibfk_1');
		});
	}

}
