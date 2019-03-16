<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_p_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->string('UnitName');
            $table->string('UnitList');
            $table->timestamps();
        });
        \App\PCategory::create([
          'Title' => 'Beden',
          'UnitName' => 'Beden',
          'UnitList' => 'XS,S,M,L,XL,XXL'
        ]);
        \App\PCategory::create([
          'Title' => 'Ayakkabı Numarası',
          'UnitName' => 'Numara',
          'UnitList' => '30-32,32-34,34-36,36-38,38-40,40-42,42-44,44-46'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_p_categories');
    }
}
