<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        Schema::create('role', function (Blueprint $table) {
         $table->increments('id');
         $table->enum('rol', ['administrator', 'seller']);
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
       Schema::dropIfExists('role');
     }
}
