<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'cmsv5_orders';
  protected $guarded = ['id'];
  public $timestamps = true;
}
