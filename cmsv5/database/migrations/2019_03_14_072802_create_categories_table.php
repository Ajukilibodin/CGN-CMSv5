<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->enum('Type', ['Category','Header'])->default('Category');
            $table->integer('ParentCategory')->default(0);
            $table->integer('UnitType')->default(0);
            $table->string('ImgUrl')->default('');
            $table->timestamps();
        });
        \App\Category::create([
          'Title' => 'Giyim',
          'Type' => 2,
          'ImgUrl' => '1.jpg'
        ]);
        \App\Category::create([
          'Title' => 'Cinsiyet',
          'Type' => 2,
          'ImgUrl' => '2.jpg'
        ]);
        \App\Category::create([
          'Title' => 'T-shirt',
          'ParentCategory' => 1,
          'UnitType' => 1,
          'ImgUrl' => '3.jpg'
        ]);
        \App\Category::create([
          'Title' => 'Ayakkabı',
          'ParentCategory' => 1,
          'UnitType' => 2,
          'ImgUrl' => '4.jpg'
        ]);
        \App\Category::create([
          'Title' => 'Kadın',
          'ParentCategory' => 2,
          'ImgUrl' => '5.jpg'
        ]);
        \App\Category::create([
          'Title' => 'Erkek',
          'ParentCategory' => 2,
          'ImgUrl' => '6.jpg'
        ]);
        \App\Category::create([
          'Title' => 'Unisex',
          'ParentCategory' => 2,
          'ImgUrl' => '7.jpg'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_categories');
    }
}
