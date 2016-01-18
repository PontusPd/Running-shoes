<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects;', function (Blueprint $table) {
            $table->increments('subjects_id')->primary();
            $table->string('subjects_name', 200)->nullable();
            $table->date('subjects_date')->nullable();
            $table->integer('sub_cat_id')->index()->nullable();
            $table->string('subjects_username', 200)->nullable();
            $table->foreign('sub_cat_id')->references('Forum_cat_id')->on('forum_cat');
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
        Schema::drop('subjects;');
    }
}
