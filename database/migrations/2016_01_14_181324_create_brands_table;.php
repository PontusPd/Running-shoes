<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;
class CreateBrandsTable; extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('brands', function(Blueprint $table){
       $table->increments('Brand_id')->primary();
       $table->text('link')->nullable();
       $table->string('Brand_title', 200)->nullable(); 
       $table->timestamp()->default(DB::raw('CURRENT_TIMESTAMP'));
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('brands');
    }
}
