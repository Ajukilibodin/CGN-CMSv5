<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $datenow = \Carbon\Carbon::now();
        Schema::create('cmsv5_customers', function (Blueprint $table) {
            $table->increments('id');//->unsigned()
            $table->string('Name');
            $table->string('Surname');
            $table->char('Email', 255);
            $table->char('Password', 70);
            $table->char('Phone', 11)->nullable();
            $table->text('WishList')->nullable();//->default(json([]));
            $table->boolean('MailSub')->default(false);
            $table->dateTime('LastLogin')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('TempCart',3000)->nullable();
            $table->string('Address', 2500)->nullable();
            $table->string('State')->nullable();
            $table->timestamps();
        });

        \App\Customer::create([
          'Name' => 'CGN',
          'Surname' => 'Yazılım',
          'Email' => 'cgn@cgnyazilim.com',
          'Password' => \Hash::make('123')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_customers');
    }
}
