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
      $pagevalues = Order::where('OrderState','<>','Done')->where('OrderState','<>','W_Confirm')->paginate(10);
      return view('modules/cart/admin/get-orders', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function listold()
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Order::where('OrderState','Done')->where('OrderState','<>','W_Confirm')->paginate(10);
      return view('modules/cart/admin/get-orders', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function editorder($o_id)
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Order::where('id',$o_id)->get()->first();
      return view('modules/cart/admin/update-order', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function editorderpost(Request $request, $o_id)
  {
    if(\Cookie::get('ajanlogin')){
      $temp_order = Order::find($o_id);
      $temp_order->OrderState = $request->input('order-state');
      $temp_order->CargoName = $request->input('order-cargoname');
      $temp_order->CargoFollow = $request->input('order-cargofollow');
      $temp_order->save();
      return redirect('/ajan/orders/current');
    }
    else return redirect('/ajan');
  }
}
