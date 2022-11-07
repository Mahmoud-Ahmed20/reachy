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
        Schema::create('seller_stocks', function (Blueprint $table) {
          $table->id();
          $table->integer('quantity');
          $table->unsignedBigInteger('product_id');
          $table->foreign('product_id')->references('id')->on('products');
          $table->unsignedBigInteger('seller_id');
          $table->foreign('seller_id')->references('id')->on('sellers');
          $table->softDeletes();
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
        Schema::dropIfExists('seller_stocks');
    }
};
