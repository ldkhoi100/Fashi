<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('blogs', function(Blueprint $table)
		{
			$table->foreign('id_objects', 'blogs_ibfk_1')->references('id')->on('objects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_categories')->references('id')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('blogs', function(Blueprint $table)
		{
			$table->dropForeign('blogs_ibfk_1');
			$table->dropForeign('blogs_id_categories_foreign');
		});
	}

}
