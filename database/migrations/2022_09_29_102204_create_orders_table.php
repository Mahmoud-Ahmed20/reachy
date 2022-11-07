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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('sub_total')->nullable();
            $table->decimal('solid_price')->nullable();
            $table->decimal('final_price')->nullable();
            $table->decimal('total_tax')->nullable();
            $table->string('code', 20);
            $table->tinyint('status')->default(1);
            $table->text('client_note')->nullable();
            $table->date('arrived_date')->nullable();
            $table->date('confirm_date')->nullable();
            $table->decimal('domestic_delivery_fee')->nullable();
            $table->date('out_delivery_date')->nullable();
            $table->date('deliverd_date')->nullable();
            $table->date('refand_date')->nullable();
            $table->date('cancel_date')->nullable();
            $table->date('refand_reasone')->nullable();
            $table->date('gift')->nullable();
            $table->integer('original_price');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->foreign('delivery_id')->references('id')->on('users');
            $table->unsignedBigInteger('station_id')->nullable();
            $table->foreign('station_id')->references('id')->on('stations');

            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');

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
        Schema::dropIfExists('orders');
    }
};
