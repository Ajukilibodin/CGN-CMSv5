<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmsv5_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->string('Categories');
            $table->integer('DetailID')->default(0);
            $table->string('Desc',1000)->default('');
            $table->double('Price',10,2)->default(0.01);
            $table->integer('PriceExchange')->default(1);
            $table->string('Barcode')->nullable();
            $table->string('Stock');
            $table->tinyInteger('Discount')->nullable();
            $table->tinyInteger('Ribbons')->nullable();
            $table->string('ImgPaths')->nullable();
            $table->timestamps();
        });
        \App\Product::create([
          'Title'=>'Erkek Tshirt',
          'Categories'=>'3,6',
          'DetailID'=>3,
          'Price'=>15.00,
          'Stock'=>'{"XS":0, "S":1, "M":2, "L":5, "XL":-1, "XXL":3}',
          'ImgPaths'=>"1.jpg"
        ]);
        \App\Product::create([
          'Title'=>'Kadın Tshirt',
          'Categories'=>'3,5',
          'DetailID'=>3,
          'Price'=>15.00,
          'Stock'=>'{"XS":0, "S":1, "M":2, "L":5, "XL":-1, "XXL":3}',
          'ImgPaths'=>"2.jpg"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmsv5_products');
    }
}
