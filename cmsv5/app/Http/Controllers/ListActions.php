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

    public function getmodal(Request $request)
    {
      $order_id = $request->_orderid;
      $order = \App\Order::find($order_id);

      $text = '<!-- Modal -->
      <div class="modal fade" id="ordermodal" tabindex="-1" role="dialog" aria-labelledby="ordermodal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ordermodal">Sipariş Numarası: SIP0'.sprintf("%09d", $order->id).'</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="table-responsive bottommargin">
                <table class="table cart">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Görsel</th>
                    <th scope="col">Ürün Adı</th>
                    <th scope="col">Birim Fiyat</th>
                    <th scope="col">Adet</th>
                    <th scope="col">Toplam Fiyat</th>
                  </tr>
                </thead>
                  <tbody>';

foreach (json_decode($order->Cart) as $cart_item) {
$c_prod = \App\Product::find($cart_item->p_id);
$imagepath = $c_prod->ImgPaths;
if(strpos($imagepath,',')) { $imagepath = substr($imagepath, 0 ,strpos($imagepath,',')); }
$price = $c_prod->Price - ($c_prod->Price/100*$c_prod->Discount);

$text.='<tr class="cart_item">

          <td class="cart-product-thumbnail">
            <a href="'.url('/product/'.$c_prod->id).'">
            <img width="64" height="64" src="'.url('/uploads/modules/product/'.$imagepath).'" alt="'.$c_prod->Title.'"></a>
          </td>

          <td class="cart-product-name">
            <a href="'.url('/product/'.$c_prod->id).'">'.$c_prod->Title.' ('.$cart_item->type.')</a>
          </td>

          <td class="cart-product-price">
            <span class="amount">'.$price.'₺</span>
          </td>

          <td class="cart-product-quantity">
            <span class="amount">'.$cart_item->count.'</span>
          </td>

          <td class="cart-product-subtotal">
            <span class="amount">'.($price*$cart_item->count).'₺</span>
          </td>
        </tr>
        ';

      }

        $text.='  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
            </div>
          </div>
        </div>
      </div>';
      return $text;
    }
}
