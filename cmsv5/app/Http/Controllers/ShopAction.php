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
      //return $request;
      $temp_cart = \Cookie::get('customercart');
      if( !$temp_cart )
        return redirect('/cart')->with('error','Boş sepet için ödeme yapamazsınız.');
      else if( count(json_decode($temp_cart))==0 )
        return redirect('/cart')->with('error','Boş sepet için ödeme yapamazsınız.');

      foreach (json_decode($temp_cart) as $key){
        $temp_prod = \App\Product::where('id',$key->p_id)->get()->first();
        foreach (json_decode($temp_prod->Stock) as $prod_stok){
          if($prod_stok->name == $key->type){
            if($key->count > $prod_stok->val){
              if($prod_stok->val > 0){
                return redirect('/cart')->with('error',
                'Stoklarımızda istediğiniz kadar ürün bulunmamaktadır. '
                .$temp_prod->Title.' ('.$key->type.') ürününden stoklarımızda "'.$prod_stok->val.'" adet kaldı.');
              }
              else{
                return redirect('/cart')->with('error',
                'Stoklarımızda istediğiniz kadar ürün bulunmamaktadır. '
                .$temp_prod->Title.' ('.$key->type.') ürünü stoklarımızda tükendi!');
              }
            }
            break;
          }
        }
      }

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
        $fiyatTR = $temp_prod->Price * $temp_prod->Exchange->Multipler;
        $cart_total += $key->count * round($fiyatTR - ($fiyatTR/100*$temp_prod->Discount) ,2);
      }

      $temp_order = \App\Order::updateOrCreate(
          ['OrderState' => 'W_Confirm', 'CustomerID' => $c_id],
          ['Address' => '', 'State' => '', 'Cart' => $temp_cart, 'CartTotal' => $cart_total]
      );
      $temp_order->save();

      return view('pages/checkout')
      ->with('c_id',$c_id)->with('t_id',$temp_order->id)
      ->with('cart_total',$cart_total)->with('cart',$temp_cart);
    }
    public function checkoutback()
    {
      $clientIP = \Request::ip();
      $c_id = \App\Customer::where('Surname',$clientIP)->get()->first();
      if($c_id) \App\Order::where('CustomerID',$c_id)->delete();

      return redirect('/cart');
    }

    public function orderdetail(Request $request){
      //return $request;

      $this->validate($request, [
        'billing-form-name'=>'required|max:250',
        'billing-form-lname'=>'required|max:250',
        'billing-form-address'=>'required|max:1000',
        'billing-form-city'=>'required|max:250',
        'billing-form-email' => 'required|email'
      ]);

      $payType = $request->input('paymenttype');
      if($payType=="3"){
        //kredi kartı
        $this->validate($request, [
          'cardNumber'=>'required',
          'cardExpiry'=>'required',
          'cardCVC'=>'required',
          'cardHolder'=>'required'
        ]);
        // NOTE: 3D ödeme gelene kadar geçici
        return back()->with('error', 'Sistemimizde geçici olarak 3D ödeme sistemi kullanılamamaktadır.');
      }

      $name = $request->input('billing-form-name');
      $lname = $request->input('billing-form-lname');
      $address = $request->input('billing-form-address').'<br>'.$request->input('billing-form-address2');
      $city = $request->input('billing-form-city');
      $email = $request->input('billing-form-email');
      $phone = $request->input('billing-form-phone');
      $cart = $request->input('cart');
      $cart_total = $request->input('cart_total');
      $c_number = $request->input('cardNumber');
      $c_exp = $request->input('cardExpiry');
      $c_cvc = $request->input('cardCVC');
      $c_holder = $request->input('cardHolder');
      $c_id = $request->input('c_id');
      $ordernote = $request->input('billing-form-message');

      $temp_customer = \App\Customer::where('id',$c_id)->get()->first();
      if($temp_customer->Email == 'none') $temp_customer->Email = $email;
      if($temp_customer->Password == 'none') $temp_customer->Password = $name.' '.$lname;
      if( !$temp_customer->Address ) $temp_customer->Address = $address;
      if( !$temp_customer->State ) $temp_customer->State = $city;
      if( !$temp_customer->Phone ) $temp_customer->Phone = $phone;
      $temp_customer->save();

      $temp_order = \App\Order::where('id',$request->input('t_id'))->get()->first();
      switch ($payType) {
        case '1': $temp_order->OrderType = 'Kapida'; break;
        case '2': $temp_order->OrderType = 'Havale'; break;
        case '3': $temp_order->OrderType = 'Kredi'; break;
      }
      if($payType=='2') $temp_order->OrderState = 'W_Pay';
      else $temp_order->OrderState = 'W_Ship';
      $temp_order->Address = $address;
      $temp_order->State = $city;
      $temp_order->Cart = $cart;
      $temp_order->CartTotal = $cart_total;
      $temp_order->OrderNote = $ordernote;
      if($request->input('billing-gift-wrap')) $temp_order->GiftWrap = true;
      // TODO: cart exchange ekle
      $temp_order->save();

      $temp_customer->TempCart=null;
      $temp_customer->save();
      \Cookie::queue(\Cookie::make('customercart', json_encode(array()), 60*24*30));

      return view('pages/order-detail')->with('temp_order',$temp_order);
    }
}
