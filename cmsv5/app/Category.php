<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      protected $table = 'cmsv5_categories';
      protected $guarded = ['id'];
      public $timestamps = true;
}
