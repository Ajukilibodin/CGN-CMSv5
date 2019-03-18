<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->double('Multipler',10,2);
            $table->timestamps();
        });
        \App\Exchange::create([
          'Title'=>'TRY',
          'Multipler'=>1
        ]);
        \App\Exchange::create([
          'Title'=>'USD',
          'Multipler'=>5.46
        ]);
        \App\Exchange::create([
          'Title'=>'EUR',
          'Multipler'=>6.20
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_exchanges');
    }
}
