<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
      protected $table = 'cmsv5_customers';
      protected $guarded = ['id'];
      public $timestamps = true;
}
