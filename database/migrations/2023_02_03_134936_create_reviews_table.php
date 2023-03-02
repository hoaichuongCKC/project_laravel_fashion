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
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->integer('star');
            $table->string('content');
            $table->unsignedInteger('image_id')->nullable();
            $table->foreign('image_id') ->references('id')->on('images')->cascadeOnDelete();
            $table->foreign('product_id') ->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('user_id') ->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('reviews');
    }
};
