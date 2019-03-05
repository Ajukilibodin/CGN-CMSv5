<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuPage extends Controller
{
  public function mainload()
  {
      if(\Cookie::get('ajanlogin')){
        $pagevalues = \App\SitePage::where('Type','<>', 2)->paginate(10);
        return view('admin/menupage', ['pagevalues' => $pagevalues]);
      }
      else return view('admin/login');
  }

  public function pagesload($p_id)
  {
      if(\Cookie::get('ajanlogin')){
        $pagevalues = \App\SitePage::where('Value', $p_id)->paginate(10);
        return view('admin/pagelist', ['pagevalues' => $pagevalues]);
      }
      else return view('admin/login');
  }
}
