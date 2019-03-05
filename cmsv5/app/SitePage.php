<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitePage extends Model
{
  protected $table = 'cmsv5_pages';
  protected $fillable = ['Title', 'Type', 'Value', 'Content'];
  public $timestamps = true;
}
