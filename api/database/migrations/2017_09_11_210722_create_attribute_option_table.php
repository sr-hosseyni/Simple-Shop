<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_option', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');

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
        Schema::dropIfExists('attribute_option');
    }
}
