<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopAction extends Controller
{
    public function addcart(Request $request, $p_id)
    {
      $temp_cart = json_decode(\Cookie::get('customercart'));
      if($temp_cart==null) $temp_cart = array();

      $type = $request->input('p_type');
      $count = (int)$request->input('p_quantity');
      $added = false;
      foreach ($temp_cart as $key) {
        if($key->type == $type && $key->p_id == $p_id){
          $key->count += $count;
          $added = true;
        }
      }

      if(!$added)
        array_push($temp_cart, ["p_id"=>(int)$p_id, "type"=>$type, "count"=>$count]);

      \Cookie::queue(\Cookie::make('customercart', json_encode($temp_cart), 60*24*30));
      $c_id = \Cookie::get('customerlogin');
      if($c_id){
        $customer = \App\Customer::where('id', $c_id)->get()->first();
        $customer->TempCart = json_encode($temp_cart);
        $customer->save();
      }
      return back();
    }
    public function delcart($p_id)
    {
      $temp_cart = json_decode(\Cookie::get('customercart'));
      if($temp_cart==null) $temp_cart = array();
      $new_cart = array();

      foreach ($temp_cart as $key) {
        if($key->p_id != (int)$p_id){
          array_push($new_cart, $key);
        }
      }

      \Cookie::queue(\Cookie::make('customercart', json_encode($new_cart), 60*24*30));
      $c_id = \Cookie::get('customerlogin');
      if($c_id){
        $customer = \App\Customer::where('id', $c_id)->get()->first();
        $customer->TempCart = json_encode($new_cart);
        $customer->save();
      }
      return back();
    }
    public function clearcart()
    {
      \Cookie::queue(\Cookie::make('customercart', json_encode(array()), 60*24*30));
      $c_id = \Cookie::get('customerlogin');
      if($c_id){
        $customer = \App\Customer::where('id', $c_id)->get()->first();
        $customer->TempCart = null;
        $customer->save();
      }
      return back();
    }
    public function updatecart(Request $request)
    {
      $temp_cart = array();
      $count = $request->input('cartcount');
      for ($i=1; $i <= $count ; $i++) {
        $temp_one = json_decode($request->input('cart_item'.$i));
        $temp_one->count = (int)$request->input('p_quantity'.$i);
        array_push($temp_cart, $temp_one);
      }
      \Cookie::queue(\Cookie::make('customercart', json_encode($temp_cart), 60*24*30));
      $c_id = \Cookie::get('customerlogin');
      if($c_id){
        $customer = \App\Customer::where('id', $c_id)->get()->first();
        $customer->TempCart = json_encode($temp_cart);
        $customer->save();
      }
      return back();
    }

    public function checkout(Request $request)
    {
      $temp_cart = \Cookie::get('customercart');
      if( !$temp_cart )
        return redirect('/cart')->with('error','Boş sepet için ödeme yapamazsınız.');

      $c_id = \Cookie::get('customerlogin');
      $temp_customer = null;
      if( !$c_id ){
        $clientIP = \Request::ip();
        //request()->ip();
        //$request->ip();
        $temp_customer = \App\Customer::firstOrCreate(
            ['Name' => 'Non-Customer', 'Surname' => $clientIP],
            ['Email' => 'none', 'Password' => 'none']
        );
        $temp_customer->save();
        $c_id = $temp_customer->id;
      }
      else{
        $temp_customer = \App\Customer::where('id',$c_id)->get()->first();
      }

      $cart_total = 0;
      foreach (json_decode($temp_cart) as $key){
        $temp_prod = \App\Product::where('id',$key->p_id)->get()->first();
        $cart_total += $key->count * ($temp_prod->Price - ($temp_prod->Price/100*$temp_prod->Discount));
      }

      $temp_order = \App\Order::updateOrCreate(
          ['OrderState' => 'W_Confirm', 'CustomerID' => $c_id],
          ['Address' => '', 'State' => '', 'Cart' => $temp_cart, 'CartTotal' => $cart_total]
      );
      $temp_order->save();

      return view('pages/checkout')->with('c_id',$c_id)->with('cart_total',$cart_total)
      ->with('temp_customer',$temp_customer)->with('temp_order',$temp_order);
    }
    public function checkoutback()
    {
      //order db tablosunda temp olarak bekleyen sepeti kaldır.
      return redirect('/cart');
    }

    public function orderdetail(Request $request){
      return $request;
      // TODO: order state istenilen konuma getir ve order kaydet
      //request olarak istenmeyen durumları back()->with('error','mesaj')
      return view('pages/order-detail');
    }
}
