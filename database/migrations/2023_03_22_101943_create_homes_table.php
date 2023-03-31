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
        
        Schema::create('homes', function (Blueprint $table) {
            
            $table->id();
            // Ana sayfa için banner bölümü
            $table->string('main_title', 50)->nullable();
            $table->string('main_sub_title', 255)->nullable();
            $table->string('main_summary', 255)->nullable();
            $table->string('banner_image',255)->nullable();


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


            // Ana sayfa için ikinci bölüm
            $table->string('second_title1', 100)->nullable();
            $table->string('second_title2', 100)->nullable();
            $table->string('second_title3', 255)->nullable();
            $table->string('second_title4', 255)->nullable();
            
            // Ana sayfa için üçücü bölüm
            //1
            $table->string('third_title1', 100)->nullable();
            $table->string('third_explanation1', 255)->nullable();
            $table->string('third_image1',255)->nullable();
            //2
            $table->string('third_title2', 255)->nullable();
            $table->string('third_explanation2', 255)->nullable();
            $table->string('third_image2',255)->nullable();
            //3
            $table->string('third_title3', 100)->nullable();
            $table->string('third_explanation3', 100)->nullable();
            $table->string('third_image3',255)->nullable();
            //4
            $table->string('third_title4', 255)->nullable();
            $table->string('third_explanation4', 255)->nullable();
            $table->string('third_image4',255)->nullable();

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
        Schema::dropIfExists('homes');
    }
};
