<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'cmsv5_sliders';
    protected $fillable = ['FilePath', 'Title', 'BigTitle', 'SubText', 'ButtonText'];
    public $timestamps = true;
}
