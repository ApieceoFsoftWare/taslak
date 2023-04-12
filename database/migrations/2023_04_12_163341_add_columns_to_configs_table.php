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
        Schema::table('configs', function (Blueprint $table) {
            //
            $table->string('title', 150)->nullable();
            $table->string('keywords', 150)->nullable();
            $table->string('description', 150)->nullable();
            $table->string('company', 150)->nullable();
            
            $table->string('smtpserver',75)->nullable();
            $table->string('smtpemail',75)->nullable();
            $table->string('smtppassword',75)->nullable();
            $table->string('smtpport')->nullable();
            $table->text('aboutus')->nullable();
            $table->text('contact')->nullable();
            $table->text('references')->nullable();
            $table->string('icon', 50)->nullable();
            $table->tinyInteger('status')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configs', function (Blueprint $table) {
            //
        });
    }
};
