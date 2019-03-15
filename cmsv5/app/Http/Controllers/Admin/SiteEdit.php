<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteEdit extends Controller
{
    public function mainload()
    {
        if(\Cookie::get('ajanlogin')){
          $sitevalues = \App\Admin\SiteValues::paginate(10);
          return view('admin/siteedit', ['sitevalues' => $sitevalues]);
        }
        else return redirect('/ajan');
    }

    public function saveSetting(Request $request, $w_id)
    {
      if(\Cookie::get('ajanlogin')){
        $this->validate($request, ['sitevalue-input' => 'required|max:250']);
        $temp = \App\Admin\SiteValues::where('id',$w_id)->first();
        $temp->Value = $request->input('sitevalue-input');
        $temp->save();
        return redirect('/ajan/sitesettings')->with('successid', $w_id);
      }
      else return redirect('/ajan');
    }
}
