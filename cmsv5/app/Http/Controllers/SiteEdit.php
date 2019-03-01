<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteEdit extends Controller
{
    public function mainload()
    {
        if(\Cookie::get('ajanlogin'))
          return view('admin/siteedit');
        else return view('admin/login');
    }
}
