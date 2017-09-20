<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeStrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_str', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');

            $table->integer('product_id', false, true);
            $table->foreign('product_id')->references('id')->on('product');

            $table->integer('attribute_id', false, true);
            $table->foreign('attribute_id')->references('id')->on('category_attribute');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_str');
    }
}
