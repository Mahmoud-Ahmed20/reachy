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
            $table->id();
            $table->string('name_ar', 20);
            $table->string('name_en', 20);
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('code', 20);
            $table->string('sku')->nullable();
            $table->decimal('orginal_price', 10, 2);
            $table->integer('tax')->nullable();
            $table->string('slug_ar', 20);
            $table->string('slug_en', 20);
            $table->string('cover_image');
            $table->boolean('inactive')->default('0');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users');
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->unsignedBigInteger('main_categorys_id');
            $table->foreign('main_categorys_id')->references('id')->on('main_categorys');
            $table->unsignedBigInteger('sub_categories_id');
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories');
            $table->unsignedBigInteger('sub_sub_category_id');
            $table->foreign('sub_sub_category_id')->references('id')->on('sub_sub_categories');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->tinyInteger('today_offer')->default('0');
            $table->tinyInteger('supermarket_offer')->default('0');
            $table->tinyInteger('discount')->default('0');
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
        Schema::dropIfExists('products');
    }
};