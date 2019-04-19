<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'cmsv5_customers';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function Orders()
    { return $this->hasMany('App\Order', 'CustomerID', 'id')->orderBy('created_at','desc'); }
}
