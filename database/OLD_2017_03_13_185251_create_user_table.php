<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('user', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->string('lastname');
             $table->string('email')->unique();
             $table->string('password');
             $table->string('image')->nullable();
             $table->boolean('active')->default(true);
             $table->rememberToken();
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
         Schema::dropIfExists('user');
     }
}