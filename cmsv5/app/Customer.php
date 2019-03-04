<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
      protected $table = 'cmsv5_customers';
      protected $fillable = ['Name', 'Surname', 'Email', 'Password', 'Phone', 'LastLogin', 'WishList'];
      public $timestamps = true;
}
