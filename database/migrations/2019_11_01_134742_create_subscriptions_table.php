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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar', 40);
            $table->string('name_en', 40);
            $table->string('slug_ar', 40);
            $table->string('slug_en', 40);
            $table->text('description_ar');
            $table->text('description_en');
            $table->decimal('amount_money');
            $table->string('img');
            $table->tinyInteger('expire')->default('0');
            $table->decimal('limited_cost')->nullable();
            $table->integer('active')->default('0');
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
        Schema::dropIfExists('subscriptions');
    }
};
