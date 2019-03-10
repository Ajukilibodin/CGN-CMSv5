<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Slider extends Controller
{
  public function mainload()
  {
      if(\Cookie::get('ajanlogin')){
        $sliders = \App\Slider::paginate(12);
        return view('modules/slider/admin/sliderlist', ['sliders' => $sliders]);
      }
      else return view('admin/login');
  }
}
