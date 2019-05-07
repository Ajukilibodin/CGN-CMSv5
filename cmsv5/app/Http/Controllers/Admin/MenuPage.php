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
      else return redirect('/ajan');
  }

  public function pagesload($p_id)
  {
      if(\Cookie::get('ajanlogin')){
        $pagevalues = SitePage::where('Value', $p_id)->get();
        return view('modules/page/admin/pagelist', ['pagevalues' => $pagevalues, 'p_id' => $p_id]);
      }
      else return redirect('/ajan');
  }

  public function addmenuload()
  {
      if(\Cookie::get('ajanlogin')){
        return view('modules/page/admin/addmenu');
      }
      else return redirect('/ajan');
  }

  public function addmenupost(Request $request)
  {
      if(\Cookie::get('ajanlogin')){
        $this->validate($request, ['menu-title' => 'required|max:100']);

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
      else return redirect('/ajan');
  }

  public function delmenu($w_id)
  {
    if(\Cookie::get('ajanlogin')){
      SitePage::where('Type',2)->where('Value', $w_id)->delete();
      SitePage::destroy($w_id);
      return redirect('/ajan/menupage');
    }
    else return redirect('/ajan');
  }

  public function addpageload($p_id)
  {
    if(\Cookie::get('ajanlogin')){
      return view('modules/page/admin/addpage')->with('p_id', $p_id);
    }
    else return redirect('/ajan');
  }

  public function addpagepost(Request $request, $p_id)
  {
      if(\Cookie::get('ajanlogin')){
        $this->validate($request, ['page-title' => 'required|max:100']);

        $mtitle = $request->input('page-title');
        $mcontent = $request->input('page-content');

        SitePage::create([
          'Title' => $mtitle,
          'Type' => 2,
          'Value' => $p_id,
          'Content' => $mcontent
        ]);
        return redirect('/ajan/menupage/'.$p_id)->with('successmsg', 'Yeni sayfa oluşturulmuştur.');
      }
      else return redirect('/ajan');
  }

  public function delpage( $w_id, $p_id)
  {
    if(\Cookie::get('ajanlogin')){
      SitePage::destroy($p_id);
      return redirect('/ajan/menupage/'.$w_id);
    }
    else return redirect('/ajan');
  }

  public function modmenuload($w_id)
  {
    if(\Cookie::get('ajanlogin')){
      $menuvalues = SitePage::where('id', $w_id)->first();
      return view('modules/page/admin/modmenu', ['menuvalues' => $menuvalues]);
    }
    else return redirect('/ajan');
  }

  public function modmenupost(Request $request, $w_id)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, ['menu-title' => 'required|max:100']);

      $mtitle = $request->input('menu-title');
      $mtype = $request->input('menu-type');
      $t_page = SitePage::where('id',$w_id)->first();
      $t_page->Title = $mtitle;
      if($mtype=="-1"){
        $t_page->Type = 1;
        $t_page->Value = 0;
      }
      else{
        $t_page->Type = 3;
        $t_page->Value = $mtype;
        SitePage::where('Type',2)->where('Value', $w_id)->delete();
      }
      $t_page->save();
      return redirect('/ajan/menupage')->with('successmsg', 'Menüyü güncelleştirdiniz.');
    }
    else return redirect('/ajan');
  }

  public function modpageload($p_id)
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = SitePage::where('id', $p_id)->first();
      return view('modules/page/admin/modpage', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function modpagepost(Request $request, $w_id, $p_id)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, ['page-title' => 'required|max:100']);

      $ptitle = $request->input('page-title');
      $pcontent = $request->input('page-content');
      $t_page = SitePage::where('id',$p_id)->first();
      $t_page->Title = $ptitle;
      $t_page->Content = $pcontent;
      $t_page->save();
      return redirect('/ajan/menupage/'.$w_id)->with('successmsg', 'Menüyü güncelleştirdiniz.');
    }
    else return redirect('/ajan');
  }

}
