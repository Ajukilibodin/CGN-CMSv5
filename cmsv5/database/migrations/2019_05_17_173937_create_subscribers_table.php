<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Mail');
            $table->timestamps();
        });

        \App\Subscriber::create(['Mail'=>'bilgi@cgnyazilim.com']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_subscribers');
    }
}
