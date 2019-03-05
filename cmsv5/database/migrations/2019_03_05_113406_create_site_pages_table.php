<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_pages', function (Blueprint $table) {
          $table->increments('id');
          $table->char('Title', 100);
          $table->enum('Type',['PageHeader','Page','DefinedPage']);
          $table->integer('Value')->default(0);
          $table->text('Content')->nullable();
          $table->timestamps();
        });

        \App\SitePage::create([
          'Title' => 'Ana Sayfa',
          'Type' => 3,
          'Value' => 0
        ]);
        \App\SitePage::create([
          'Title' => 'Hakkımızda',
          'Type' => 1
        ]);
        \App\SitePage::create([
          'Title' => 'Kurumsal',
          'Type' => 2,
          'Value' => 2,
          'Content' => 'Bir maceranın Greenwich’i, kendini iyi hissetmektir. Bavulun yanında iken, evden çıkmadan hemen önce aynada gördüğün insan, hem özgür hem de güvende olmalı. Tam olarak yolumuz burada kesişiyor.'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_pages');
    }
  }
