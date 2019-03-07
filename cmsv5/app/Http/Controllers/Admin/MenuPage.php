<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SitePage;

class MenuPage extends Controller
{
  public function mainload()
  {
      if(\Cookie::get('ajanlogin')){
        $pagevalues = SitePage::where('Type','<>', 2)->paginate(10);
        return view('modules/page/admin/menupage', ['pagevalues' => $pagevalues]);
      }
      else return view('admin/login');
  }

  public function pagesload($p_id)
  {
      if(\Cookie::get('ajanlogin')){
        $pagevalues = SitePage::where('Value', $p_id)->paginate(10);
        return view('modules/page/admin/pagelist', ['pagevalues' => $pagevalues]);
      }
      else return view('admin/login');
  }

  public function addmenuload()
  {
      if(\Cookie::get('ajanlogin')){
        return view('modules/page/admin/addmenu');
      }
      else return view('admin/login');
  }

  public function addmenupost(Request $request)
  {
      if(\Cookie::get('ajanlogin')){
        $mtitle = $request->input('menu-title');
        $mtype = $request->input('menu-type');
        if($mtype=="-1"){
          SitePage::create([
            'Title' => $mtitle,
            'Type' => 1
          ]);
        }
        else{
          SitePage::create([
            'Title' => $mtitle,
            'Type' => 3,
            'Value' => $mtype
          ]);
        }
        return redirect('/ajan/menupage')->with('successmsg', 'Yeni menü oluşturulmuştur.');
      }
      else return view('admin/login');
  }

}
