<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
         Schema::create('operation_type', function (Blueprint $table) {
          $table->increments('id');
          $table->enum('operation', ['sale', 'purchase', 'in-box', 'out-box', 'fix']);
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
        Schema::dropIfExists('operation_type');
      }
}
