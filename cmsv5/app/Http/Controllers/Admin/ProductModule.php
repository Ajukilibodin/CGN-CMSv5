<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class ProductModule extends Controller
{
  public function categoryload()
  {
      if(\Cookie::get('ajanlogin')){
        $pagevalues = Category::where('Type', 2)->paginate(10);
        return view('modules/product/admin/list-categories', ['pagevalues' => $pagevalues]);
      }
      else return view('admin/login');
  }
}
