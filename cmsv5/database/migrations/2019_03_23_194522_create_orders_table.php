<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('OrderType',['Kredi', 'Havale', 'Kapıda'])->nullable();
            $table->enum('OrderState', ['W_Confirm','W_Pay','W_Ship', 'W_Arrive', 'W_CustomerConfirm']);
            $table->integer('CustomerID');
            $table->string('Address', 3000);
            $table->string('State');
            $table->string('Cart',3000);
            $table->double('CartTotal',10,2);
            $table->integer('CartExchange')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_orders');
    }
}
