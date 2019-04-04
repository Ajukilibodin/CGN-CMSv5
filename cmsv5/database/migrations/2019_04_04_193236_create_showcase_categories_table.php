<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowcaseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_showcase_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title')->nullable();
            $table->string('SubText')->nullable();
            $table->integer('CateID');
            $table->integer('ShowcaseWidth')->default(1);
            $table->timestamps();
        });
        \App\Showcase\ShowcaseCategory::create([
          'Title'=>'Giyim', 'SubText'=>'textil ve ekipmanlar',
          'CateID'=>1
        ]);
        \App\Showcase\ShowcaseCategory::create([
          'Title'=>'Şık Tasarımlar', 'SubText'=>'Sizler için özenle tasarlanan ürünler',
          'CateID'=>2
        ]);
        \App\Showcase\ShowcaseCategory::create([
          'Title'=>'Ayakkabı', 'SubText'=>'textil ve ekipmanlar',
          'CateID'=>4
        ]);
        \App\Showcase\ShowcaseCategory::create([
          'Title'=>'Kadın Ürünleri', 'SubText'=>'textil ve ekipmanlar',
          'CateID'=>5
        ]);
        \App\Showcase\ShowcaseCategory::create([
          'Title'=>'Erkek Ürünleri', 'SubText'=>'textil ve ekipmanlar',
          'CateID'=>6
        ]);
        \App\Showcase\ShowcaseCategory::create([
          'Title'=>'Unisex Ürünler', 'SubText'=>'textil ve ekipmanlar',
          'CateID'=>7
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_showcase_categories');
    }
}
