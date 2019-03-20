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
            $table->string('Stock',2000);
            $table->integer('StockAlarm')->default(-1);
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
          'Stock'=>'[{"name":"XS","val":0},{"name":"S","val":1},{"name":"M","val":2},{"name":"L","val":5},{"name":"XL","val":-1},{"name":"XXL","val":-1}]',
          'ImgPaths'=>"1.jpg"
        ]);
        \App\Product::create([
          'Title'=>'Kadın Tshirt',
          'Categories'=>'3,5',
          'DetailID'=>3,
          'Price'=>15.00,
          'Stock'=>'[{"name":"XS","val":-1},{"name":"S","val":2},{"name":"M","val":3},{"name":"L","val":0},{"name":"XL","val":0},{"name":"XXL","val":4}]',
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
