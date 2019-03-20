<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminLogin extends Model
{
    protected $table = 'cmsv5_adminlogins';
    protected $guarded = ['id'];
    //protected $fillable = ['Username', 'Password', 'LastLogin'];
    //protected $hidden = ['Password'];
    public $timestamps = false;
}
