<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKindPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
          Schema::create('kind_person', function (Blueprint $table) {
           $table->increments('id');
           $table->enum('kind', ['client', 'provider']);
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
          Schema::dropIfExists('kind_person');
     }
}
