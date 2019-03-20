<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
  protected $table = 'cmsv5_exchanges';
  protected $guarded = ['id'];
  public $timestamps = true;
}
