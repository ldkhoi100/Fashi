<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBlogCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('blog_comments', function(Blueprint $table)
		{
			$table->foreign('id_blogs', 'blog_comments_ibfk_1')->references('id')->on('blogs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('blog_comments', function(Blueprint $table)
		{
			$table->dropForeign('blog_comments_ibfk_1');
		});
	}

}
