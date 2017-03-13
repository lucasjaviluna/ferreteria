<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('permission_role', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('role_id');
        $table->integer('permission_id');
        $table->foreign('role_id')->references->('id')->on('role');
        $table->foreign('permission_id')->references->('id')->on('permission');
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
      Schema::dropIfExists('permission_role');
    }
}
