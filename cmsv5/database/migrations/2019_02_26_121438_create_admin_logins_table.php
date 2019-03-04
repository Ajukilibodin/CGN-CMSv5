<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $datenow = \Carbon\Carbon::now();
        Schema::create('cmsv5_adminlogins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Username');
            $table->char('Password',70);
            $table->dateTime('LastLogin')->nullable();
        });

        \App\AdminLogin::create([
          'Username' => 'cgn',
          'Password' => \Hash::make('123'),
          'LastLogin' => $datenow
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_adminlogins');
    }
}
