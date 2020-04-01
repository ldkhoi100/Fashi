<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();

            $table->integer('id_categories')->unsigned()->nullable();
            $table->foreign('id_categories')->references('id')->on('categories');

            $table->integer('id_objects')->unsigned()->nullable();
            $table->foreign('id_objects')->references('id')->on('objects');

            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('slide');
    }
}