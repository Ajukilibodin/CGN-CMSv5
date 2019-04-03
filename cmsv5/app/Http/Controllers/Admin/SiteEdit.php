<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteEdit extends Controller
{
    public function mainload()
    {
        if(\Cookie::get('ajanlogin')){
          $sitevalues = \App\Admin\SiteValues::all();
          return view('admin/siteedit', ['sitevalues' => $sitevalues]);
        }
        else return redirect('/ajan');
    }

    public function savesettings(Request $request)
    {
      if(\Cookie::get('ajanlogin')){
        $this->validate($request, [
          'val-toptext' => 'required|max:250',
          'val-title' => 'required|max:250',
          'val-email' => 'required|max:250',
          'val-phone' => 'required|max:250',
          'val-mobile' => 'required|max:250',
          'val-addr1' => 'required|max:250',
          'val-addr2' => 'required|max:250'
        ]);
        $temp = \App\Admin\SiteValues::all();
        $temp[0]->Value = $request->input('val-toptext');
        $temp[0]->save();
        $temp[1]->Value = $request->input('val-title');
        $temp[1]->save();
        $temp[2]->Value = $request->input('val-email');
        $temp[2]->save();
        $temp[3]->Value = $request->input('val-phone');
        $temp[3]->save();
        $temp[4]->Value = $request->input('val-mobile');
        $temp[4]->save();
        $temp[5]->Value = $request->input('val-addr1');
        $temp[5]->save();
        $temp[6]->Value = $request->input('val-addr2');
        $temp[6]->save();
        return redirect('/ajan/sitesettings')->with('success', 'Site Ayarları Güncellenmiştir.');
      }
      else return redirect('/ajan');
    }
}
