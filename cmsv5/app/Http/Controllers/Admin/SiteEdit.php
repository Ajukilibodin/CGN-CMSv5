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
          'val-addr2' => 'required|max:250',
          'val-smyani' => 'required|max:250',
          'val-footer' => 'required|max:250',
          'val-bank1' => 'required|max:250',
          'val-bank2' => 'required|max:250',
          'val-bank3' => 'required|max:250',
          'val-bank4' => 'required|max:250'
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
        $temp[7]->Value = $request->input('val-smyani');
        $temp[7]->save();
        $temp[8]->Value = $request->input('val-footer');
        $temp[8]->save();
        $temp[9]->Value = $request->input('val-bank1');
        $temp[9]->save();
        $temp[10]->Value = $request->input('val-bank2');
        $temp[10]->save();
        $temp[11]->Value = $request->input('val-bank3');
        $temp[11]->save();
        $temp[12]->Value = $request->input('val-bank4');
        $temp[12]->save();

        $ribbon = 0;
        if($request->input('val-pay1')) $ribbon+=1;
        if($request->input('val-pay2')) $ribbon+=2;
        if($request->input('val-pay3')) $ribbon+=4;
        $temp[13]->Value = $ribbon;
        $temp[13]->save();

        return redirect('/ajan/sitesettings')->with('success', 'Site Ayarları Güncellenmiştir.');
      }
      else return redirect('/ajan');
    }

    public function socialaccounts()
    {
      if(\Cookie::get('ajanlogin')){
        $sociallist = \App\Social::all();
        return view('admin/social-accounts', ['sociallist' => $sociallist]);
      }
      else return redirect('/ajan');
    }

    public function socialpost(Request $request)
    {
      if(\Cookie::get('ajanlogin')){
        $this->validate($request, [
          'social-link' => 'required|max:250'
        ]);

        \App\Social::create([
          'Type'=>$request->input('social-type'),
          'Link'=>$request->input('social-link')
        ]);

        return redirect('/ajan/socialaccounts')->with('success', 'Yeni Sosyal Medyanız Eklenmiştir.');
      }
      else return redirect('/ajan');
    }

    public function delsocial($s_id)
    {
      \App\Social::destroy($s_id);
      return redirect('/ajan/socialaccounts')->with('success', 'Seçilen Sosyal Medya Kaldırıldı.');
    }

    public function subscribers()
    {
      if(\Cookie::get('ajanlogin')){
        $subscribers = \App\Subscriber::all();
        return view('admin/subscribe-list', ['pagevalues' => $subscribers]);
      }
      else return redirect('/ajan');
    }
}
