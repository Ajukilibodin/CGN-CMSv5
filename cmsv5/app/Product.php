<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'cmsv5_products';
  protected $fillable = ['Title', 'Categories', 'DetailID', 'Desc',
  'Price', 'PriceExchange', 'Barcode', 'Stock', 'Discount', 'Ribbons', 'ImgPaths'];
  public $timestamps = true;
}
