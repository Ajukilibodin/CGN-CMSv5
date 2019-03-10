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
            $table->string('FilePath');
            $table->string('Title');
            $table->string('BigTitle');
            $table->string('SubText');
            $table->string('ButtonText');
            $table->enum('TextAlign',['Left','Right']);
            $table->timestamps();
        });

        \App\Slider::create([
          'FilePath' => 'slider01.jpg',
          'Title' => 'YAZLIKLARI ÇIKARMADAN ÖNCE SİTEMİZE GÖZ ATIN',
          'BigTitle' => 'YENİ SEZONLAR <br>GELDİ !',
          'SubText' => 'Bu yaz sporu ve şıklığı aynı anda yaşayacak & maceralarınıza tarz katacaksınız.',
          'ButtonText' => 'KEŞFET',
          'TextAlign' => 'Right'
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
