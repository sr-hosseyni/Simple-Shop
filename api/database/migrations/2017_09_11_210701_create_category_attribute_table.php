<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_attribute', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('desc')->nullable();
            $table->enum('type', ['str', 'int', 'dtm', 'opt', 'txt']);

            $table->integer('category_id', false, true);
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
        Schema::dropIfExists('category_attribute');
    }
}
