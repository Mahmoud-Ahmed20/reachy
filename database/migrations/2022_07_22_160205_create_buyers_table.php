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
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name', 40);
            $table->string('second_name', 40);
            $table->string('avatar', 100)->nullable();
            $table->string('phone_number', 11)->unique();
            $table->integer('inactive')->default('0');
            $table->enum('gendar', array('male', 'female'));
            $table->tinyInteger('favorite_payment')->default('0');
            $table->text('note')->nullable();
            // $table->unsignedBigInteger('subuscription_id');
            // $table->foreign('subuscription_id')->references('id')->on('subuscriptions');
            $table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('buyers');
    }
};
