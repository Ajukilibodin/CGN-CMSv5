<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SiteValues extends Model
{
      protected $table = 'cmsv5_sitevalues';
      protected $guarded = ['id'];
      public $timestamps = false;
}
