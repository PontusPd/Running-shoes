<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply;', function (Blueprint $table) {
            $table->increments('reply_id')->primary();
            $table->text('reply_text')->nullable();
            $table->date('reply_date')->nullable();
            $table->string('reply_topic', 200)->nullable();
            $table->string('reply_by', 200)->index()->nullable();
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
        Schema::drop('reply;');
    }
}
