<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('company')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('image')->nullable();
            $table->integer('kind_person_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kind_person_id')->references->('id')->on('kind_person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person');
    }
}
