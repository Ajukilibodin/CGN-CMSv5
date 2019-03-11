<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FilePath')->nullable();
            $table->string('Title');
            $table->string('BigTitle');
            $table->string('SubText');
            $table->string('ButtonText');
            $table->string('ButtonLink')->nullable();
            $table->string('PicPath')->nullable();
            $table->timestamps();
        });

        \App\Slider::create([
          'FilePath' => '2.jpg',
          'Title' => 'YAZLIKLARI ÇIKARMADAN ÖNCE SİTEMİZE GÖZ ATIN',
          'BigTitle' => 'YENİ SEZONLAR GELDİ !',
          'SubText' => 'Bu yaz sporu ve şıklığı aynı anda yaşayacak & maceralarınıza tarz katacaksınız.',
          'ButtonText' => 'KEŞFET',
          'PicPath' => '2-1.png'
        ]);

        \App\Slider::create([
          'FilePath' => '1.jpg',
          'Title' => 'DOĞADA KAMPTA HER ZAMAN İHTİYACINIZ',
          'BigTitle' => 'KAMP - HIKING ÇANTALARI',
          'SubText' => 'En zorlu şartlarda bile sizi yarı yolda bırakmayacak çantalar.',
          'ButtonText' => 'ALIŞVERİŞE BAŞLA',
          'PicPath' => '1-1.png'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_sliders');
    }
}
