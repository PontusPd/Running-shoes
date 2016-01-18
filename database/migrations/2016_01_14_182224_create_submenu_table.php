<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenu;s;', function (Blueprint $table) {
            $table->increments('submenu_id')->primary();
            $table->integer('submenu_menu_id')->nullable();
            $table->foreign('submenu_menu_id')->references('menu_id')->on('menus');
            $table->text('submenu_link')->nullable();
            $table->string('submenu_name', 200)->nullable();
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
        Schema::drop('submenu;s;');
    }
}
