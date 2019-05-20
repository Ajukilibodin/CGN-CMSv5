<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'cmsv5_social_accounts';
    protected $guarded = ['id'];
    public $timestamps = true;
}
