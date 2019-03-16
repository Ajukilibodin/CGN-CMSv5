<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PCategory extends Model
{
  protected $table = 'cmsv5_p_categories';
  protected $fillable = ['Title', 'UnitName', 'UnitList'];
  public $timestamps = true;
}
