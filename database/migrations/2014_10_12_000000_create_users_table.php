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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name', 40);
            $table->string('second_name', 40);
            $table->string('avatar', 100);
            $table->date('birthday');
            $table->enum('gendar', array('male', 'female'));
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('phone_number', 30)->unique();
            $table->string('sec_phone_number')->unique();
            $table->text('note')->nullable();
            $table->tinyInteger('deactivate')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
};
