<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('barcode')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('stock_min')->default(30);
            $table->float('price_in', 6, 2);
            $table->float('price_out', 6, 2);
            $table->string('unit');
            $table->string('presentation')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('stock');
            $table->integer('category_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
