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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('title');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('detail_image',255)->nullable();
            $table->string('list_image',255)->nullable();
            $table->string('topic')->nullable();
            $table->text('detail')->nullable();
            $table->string('desired_features')->nullable();
            $table->tinyInteger('progress_status')->default(0);
            $table->tinyInteger('scoring')->default(0);
            $table->string('number_of_people')->nullable();
            $table->string('number_of_people_admitted')->nullable();
            $table->string('deadline')->nullable();
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('advertisements');
    }
};
