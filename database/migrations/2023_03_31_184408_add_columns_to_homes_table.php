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
        Schema::table('homes', function (Blueprint $table) {
            //
            Schema::table('homes',function(Blueprint $table){
            
                // Ana sayfa için 600x370 px'lik Bölüm
                // 1
                $table->string('sub_banner_img1', 255)->default(asset('assets/images/Default_Sub_Banner.png'));
                $table->string('sub_banner_img1_title',100)->default('Birlikten Güç Doğar');
                $table->string('sub_banner_img1_sub_title',100)->default('Bilgilerinizi Paylaşın');
                $table->string('sub_banner_img1_btn_title',100)->default('Yardım Et!');
                // 2
                $table->string('sub_banner_img2', 255)->default(asset('assets/images/Default_Sub_Banner.png'));
                $table->string('sub_banner_img2_title',100)->default('Yardıma İhtiyacın mı var?');
                $table->string('sub_banner_img2_sub_title',100)->default('Destek Eksik Olmaz');
                $table->string('sub_banner_img2_btn_title',100)->default('İlan Paylaş');
                //3
                $table->string('sub_banner_img3', 255)->default(asset('assets/images/Default_Sub_Banner.png'));
                $table->string('sub_banner_img3_title',100)->default('Projen ekibinle hız kazansın');
                $table->string('sub_banner_img3_sub_title',100)->default('Zamanında Teslim Projeler');
                $table->string('sub_banner_img3_btn_title',100)->default('Arkadaş Edin');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            //
        });
    }
};
