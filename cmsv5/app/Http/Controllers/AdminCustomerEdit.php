<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCustomerEdit extends Controller
{
    public function mainload()
    {
        if(\Cookie::get('ajanlogin'))
          return view('admin/customers');
        else return view('admin/login');
    }
}
