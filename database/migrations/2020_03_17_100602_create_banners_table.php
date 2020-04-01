<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_objects')->unsigned()->nullable();
            $table->foreign('id_objects')->references('id')->on('objects');

            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->string('position')->nullable();

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
        Schema::dropIfExists('banners');
    }
}