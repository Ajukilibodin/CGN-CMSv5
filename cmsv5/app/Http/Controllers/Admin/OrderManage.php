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
      $pagevalues = Order::all();
      return view('modules/cart/admin/get-orders', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function listcurrent()
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Order::where('OrderState','<>','Done')->where('OrderState','<>','W_Confirm')->get();
      return view('modules/cart/admin/get-orders', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function listold()
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Order::where('OrderState','Done')->where('OrderState','<>','W_Confirm')->get();
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
      $order_state = $request->input('order-state');
      $cargo_name = $request->input('order-cargoname');
      $cargo_follow = $request->input('order-cargofollow');
      $temp_order = Order::find($o_id);
      if( ($temp_order->OrderState != 'W_Arrive' && $temp_order->OrderState != 'Done') && $order_state >= 4){
        //sipariş kargoya verildi veya direk kargoya verilmeden sipariş tamamlandı demek
        $this->validate($request, [
          'order-cargoname' => 'required|max:250',
          'order-cargofollow' => 'required|max:250'
        ]);
        $adderror = false;
        foreach ( json_decode($temp_order->Cart) as $cartitem ) {
          $c_prod = \App\Product::where('id',$cartitem->p_id)->get()->first();
          $prod_stock = json_decode($c_prod->Stock);
          foreach ($prod_stock as $stok_item) {
            if($stok_item->name == $cartitem->type){
              if($stok_item->val < $cartitem->count)
              {  $adderror = true; }
              else
              { $stok_item->val -= $cartitem->count; }
            }
          }
        }
        if(!$adderror){
          $c_prod->Stock = json_encode($prod_stock);
          $c_prod->save();
        }
        else{
          return back()->with('error', 'Stoğunuzda bulunmayan ürünleri kargolayamazsınız!..');
        }
      }
      else if( ($temp_order->OrderState == 'W_Arrive' || $temp_order->OrderState == 'Done') && $order_state <= 3){
        //kargodaki sipariş tekrardan sipariş konumuna alınıyor ise
        //siparişin stopu geri gelmeyecek, error ile durum bildirilecek
        return back()->with('error', 'Kargolanmış bir sipariş tekrardan depoya giremez.');
      }

      $temp_order->OrderState = $order_state;
      $temp_order->CargoName = $cargo_name;
      $temp_order->CargoFollow = $cargo_follow;
      $temp_order->save();
      return redirect('/ajan/orders/current');
    }
    else return redirect('/ajan');
  }
}
