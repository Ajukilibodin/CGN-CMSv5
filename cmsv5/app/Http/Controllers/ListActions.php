<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListActions extends Controller
{
    public function load(Request $request)
    {
      if(\Cookie::get('customerlogin')){
        $customer = \App\Customer::find( \Cookie::get('customerlogin') );
        $customerlist = array();
        if($customer->WishList != null) $customerlist = json_decode($customer->WishList);

        //_act _prod _stok
        $temp = ['act'=>$request->_act, 'prod'=>$request->_prod, 'stok'=>$request->_stok];

        if( $customer->WishList == null )
          array_push($customerlist, $temp);
        else {
          $found = false;
          foreach ($customerlist as $key) {
            if($key == $temp){
              $found = true;
            }
          }
          if(!$found)
            array_push($customerlist, $temp);
        }

        $customer->WishList = json_encode($customerlist);
        $customer->save();
        return 'OK';
      }
      else{
        return "NonLogin";
      }
    }
}
