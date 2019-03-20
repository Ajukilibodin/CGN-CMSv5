<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
  protected $table = 'cmsv5_verification';
  protected $guarded = ['id'];
  public $timestamps = false;
}
