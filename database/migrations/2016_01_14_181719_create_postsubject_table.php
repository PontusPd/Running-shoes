<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postsubject;', function (Blueprint $table) {
            $table->increments('post_id')->primary();
            $table->string('post_name', 200)->nullable();
            $table->text('post_content')->nullable();
            $table->date('post_date')->nullable();
            $table->string('post_by')->nullable();
            $table->integer('post_subject_id')->index()->nullable();
            $table->foreign('post_subject_id')->references('subjects_id')->on('subjects');
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
        Schema::drop('postsubject;');
    }
}
