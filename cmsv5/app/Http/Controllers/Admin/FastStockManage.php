<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FastStockManage extends Controller
{
    public function load()
    {
      if(\Cookie::get('ajanlogin')){
        return view('modules/product/admin/faststock')->with('prod', false);
      }
      else return redirect('/ajan');
    }

    public function load2(Request $request)
    {
      $barkod = $request->input('fst-barkod');
      if(\Cookie::get('ajanlogin')){
        $prod = \App\Product::where('Barcode', $barkod)->get();

        if($prod->count() <= 0)
          $prod = \App\Product::where('Barcode','LIKE','%'.$barkod.'%')->get();

        if($prod->count() > 0)
          return view('modules/product/admin/faststock')->with('prod', $prod->first());
        else return back()->with('error', 'Belirtilen barkodu içeren bir ürün bulamadık.');
      }
      else return redirect('/ajan');
    }
}
