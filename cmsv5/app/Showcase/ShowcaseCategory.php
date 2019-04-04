<?php

namespace App\Showcase;

use Illuminate\Database\Eloquent\Model;

class ShowcaseCategory extends Model
{
      protected $table = 'cmsv5_showcase_categories';
      protected $guarded = ['id'];
      public $timestamps = true;
}
