<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingcart;', function (Blueprint $table) {
            $table->increments('shoppingcart_id')->primary();
            $table->string('shoppingcart_prod_name')->nullable();
            $table->integer('shoppingcart_prod_price')->nullable();
            $table->integer('full_prise_prod')->default(0);
            $table->string('shoppingcart_prod_title', 200)->nullable();
            $table->text('shoppingcart_prod_label')->nullable();
            $table->text('shoppingcart_prod_img')->nullable();
            $table->integer('cart_pro_qty')->unsigned()->default(0);
            $table->integer('cart_user_id')->index()->nullable();
            $table->integer('prod_id')->index()->nullable();
            $table->foreign('cart_user_id')->references('user_id')->on('users');
            $table->foreign('prod_id')->references('products_id')->on('products');
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
        Schema::drop('shoppingcart;');
    }
}
