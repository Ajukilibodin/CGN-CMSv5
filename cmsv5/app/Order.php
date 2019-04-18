<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'cmsv5_orders';
  protected $guarded = ['id'];
  public $timestamps = true;

  public function Customer()
  { return $this->hasOne('App\Customer', 'id', 'CustomerID'); }

  public function Exchange()
  { return $this->hasOne('App\Exchange', 'id', 'CartExchange'); }
}
