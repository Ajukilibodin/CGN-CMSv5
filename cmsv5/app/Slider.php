<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'cmsv5_sliders';
    protected $guarded = ['id'];
    public $timestamps = true;
}
