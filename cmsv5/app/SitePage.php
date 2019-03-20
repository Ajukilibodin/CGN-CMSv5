<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitePage extends Model
{
  protected $table = 'cmsv5_pages';
  protected $guarded = ['id'];
  public $timestamps = true;
}
