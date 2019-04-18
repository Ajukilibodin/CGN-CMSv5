<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderManage extends Controller
{
  public function listorder()
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Order::paginate(10);
      return view('modules/cart/admin/get-orders', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function listcurrent()
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Order::where('OrderState','<>','Done')->paginate(10);
      return view('modules/cart/admin/get-orders', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function listold()
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Order::where('OrderState','Done')->paginate(10);
      return view('modules/cart/admin/get-orders', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }
}
