<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_social_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('Type', ['Facebook','Instagram', 'Twitter'
              ,'Youtube', 'Pinterest','LinkedIN', 'Blogger'
              ,'FourSquare', 'Tumblr','SoundCloud', 'Wikipedia']);
            $table->string('Link');
            $table->tinyInteger('Order')->default(0);
            $table->timestamps();
        });

        \App\Social::create([
          'Type'=>2,
          'Link'=>'http://instagram.com/cgnyazilim'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_social_accounts');
    }
}
