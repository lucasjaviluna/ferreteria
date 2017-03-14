<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up() {
          Schema::create('operation', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('product_id')->unsigned();
              $table->integer('quantity');
              $table->float('price_out', 6, 2);
              $table->integer('operation_type_id')->unsigned();
              $table->integer('sell_id')->nullable()->unsigned();
              $table->foreign('product_id')->references('id')->on('product');
              $table->foreign('operation_type_id')->references('id')->on('operation_type');
              $table->foreign('sell_id')->references('id')->on('sell');
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
         Schema::dropIfExists('operation');
     }
}
