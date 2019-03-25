<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_verification', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('UserID');
            $table->string('Token', 100);
            $table->enum('Type',['NewRegister','ForgotPassword','ShopCustomer'])->default('NewRegister');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_verification');
    }
}
