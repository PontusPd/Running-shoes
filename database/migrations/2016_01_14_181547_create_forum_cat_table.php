<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_cat;', function (Blueprint $table) {
            $table->increments('Forum_cat_id')->primary();
            $table->string('Forum_cat_name', 200)->nullable();
            $table->integer('forum_qty')->unsigned()->default(0);
            $table->text('Forum_cat_desc')->nullable();
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
        Schema::drop('forum_cat;');
    }
}
