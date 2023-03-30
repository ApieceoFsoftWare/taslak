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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            // Telefon numaraları için değişkenler
            $table->string('phone_number1')->nullable();
            $table->string('phone_number2')->nullable();
            $table->string('phone_number3')->nullable();
            $table->string('phone_number4')->nullable();
            
            // Adres için değişkenler
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('address4')->nullable();

            // Lokasyon Bilgileri
            $table->string('location1')->nullable();
            $table->string('location2')->nullable();
            $table->string('location3')->nullable();
            $table->string('location4')->nullable();

            // Sosyal Medya Hesapları
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->string('mail1')->nullable();
            $table->string('mail2')->nullable();
            $table->string('mail3')->nullable();
            $table->string('mail4')->nullable();

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
        Schema::dropIfExists('configs');
    }
};
