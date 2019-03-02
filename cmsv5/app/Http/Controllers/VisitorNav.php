<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorNav extends Controller
{
    public function index(){
      return view('pages/index');
    }
}
