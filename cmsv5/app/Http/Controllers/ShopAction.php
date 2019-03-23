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
        if($key->type == $type){
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
}
