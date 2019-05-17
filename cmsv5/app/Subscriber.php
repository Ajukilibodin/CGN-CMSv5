<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'cmsv5_subscribers';
    protected $guarded = ['id'];
    public $timestamps = true;
}
