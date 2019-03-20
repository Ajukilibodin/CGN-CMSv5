<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'cmsv5_products';
  protected $guarded = ['id'];
  public $timestamps = true;
}
