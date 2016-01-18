<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus;', function (Blueprint $table) {
            $table->increments('menu_id')->primary();
            $table->string('menu_name', 200)->nullable();
            $table->text('menu_href')->nullable();
            $table->text('info')->nullable();
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
        Schema::drop('menus;');
    }
}
