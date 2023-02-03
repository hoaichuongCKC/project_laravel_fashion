<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barnes_code');
            $table->string('name');
            $table->float('price');
            $table->integer('stock');
            $table->string('sizes');
            $table->string('colors');
            $table->unsignedInteger('image_id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id') ->references('id')->on('categories')->cascadeOnDelete();
            $table->foreign('image_id') ->references('id')->on('images')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
