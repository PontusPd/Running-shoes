<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products;', function (Blueprint $table) {
            $table->increments('products_id')->primary();
            $table->string('products_name', 200)->nullable();
            $table->integer('Products_price')->nullable();
            $table->text('product_image')->nullable();
            $table->string('product_title', 200)->nullable();
            $table->text('product_desc')->nullable();
            $table->integer('product_cat')->index()->nullable();
            $table->foreign('product_cat')->references('Cat_id')->on('cats');
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products;');
    }
}
