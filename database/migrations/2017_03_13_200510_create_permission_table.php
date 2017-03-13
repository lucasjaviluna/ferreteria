<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        Schema::create('permission', function (Blueprint $table) {
         $table->increments('id');
         $table->enum('name', ['sell', 'buy', 'box-cut', 'box-close', 'box-in'
          , 'box-out', 'report', 'user-create', 'user-update', 'user-delete'
          , 'provider-create', 'provider-update', 'provider-delete'
          , 'client-create', 'client-update', 'client-delete']);
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
       Schema::dropIfExists('permission');
     }
}
