<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('person_id')->unsigned();
             $table->integer('user_id')->unsigned();
             $table->integer('operation_type_id')->unsigned();
             $table->integer('box_id')->nullable()->unsigned();
             $table->foreign('person_id')->references('id')->on('person');
             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('operation_type_id')->references('id')->on('operation_type');
             $table->foreign('box_id')->references('id')->on('box');
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
        Schema::dropIfExists('sell');
    }
}
