<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();

            $table->integer('id_categories')->unsigned()->nullable();
            $table->foreign('id_categories')->references('id')->on('categories');
            $table->integer('id_objects')->unsigned()->nullable();
            $table->foreign('id_objects')->references('id')->on('objects');

            $table->mediumText('description')->nullable();
            $table->float('unit_price', 20, 2)->nullable();
            $table->float('promotion_price', 20, 2)->nullable()->default(0);
            $table->integer('amount')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->boolean('highlight')->default(0);
            $table->boolean('new')->default(0);
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
        Schema::dropIfExists('products');
    }
}