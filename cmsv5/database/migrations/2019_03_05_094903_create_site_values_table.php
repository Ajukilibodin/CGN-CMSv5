<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_sitevalues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Desc');
            $table->char('Value', 255);
            //$table->timestamps();
        });

        //İlk demo değerlerini girme
        \App\Admin\SiteValues::create(['Desc' => 'Site Topbar Yazısı', 'Value' => 'CGN CMSv5 Demo']);
        \App\Admin\SiteValues::create(['Desc' => 'Site Title', 'Value' => 'CGN CMSv5']);
        \App\Admin\SiteValues::create(['Desc' => 'Eposta', 'Value' => 'cgn@cgnyazilim.com']);
        \App\Admin\SiteValues::create(['Desc' => 'Telefon', 'Value' => '0232 343 4491']);
        \App\Admin\SiteValues::create(['Desc' => 'Mobil', 'Value' => '0232 343 4491']);
        \App\Admin\SiteValues::create(['Desc' => 'Adres1', 'Value' => 'Adalet Mah. 1593/1 No:15']);
        \App\Admin\SiteValues::create(['Desc' => 'Adres2', 'Value' => 'Bayraklı/İZMİR']);
        \App\Admin\SiteValues::create(['Desc' => 'SM Yanı Text', 'Value' => 'Doğaya ve spora tutkuyla bağlı olanların markası W.S.A, çeşitli kategorilerde sunduğu spor giyim ürünleri ile yaz kış maceranızı destekliyor..']);
        \App\Admin\SiteValues::create(['Desc' => 'Footer Slogan', 'Value' => 'Sizin için yaz & kış macera ürünleri tasarlıyoruz.']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_sitevalues');
    }
}
