<div class="row clearfix">

  <div class="col-md-4 clearfix fleft">


    <div class="col-md-8 col-xs-7 nopadding">
    <input type="text" value="" class="sm-form-control" placeholder="İndirim kuponum var :)" />
    </div>

    <div class="col-md-4 col-xs-5">
    <a href="#" class="button button-3d button-black nomargin">KUPONU KULLAN</a>
    </div>


  </div>
  <div class="col-md-4 clearfix fleft">

  </div>
<div class="col-md-6 clearfix fright">

  <div class="table-responsive">


    <table class="table cart">
      <tbody>
        @php($cart_total = 0)
        @foreach(json_decode(\Cookie::get('customercart')) as $cart_item)
        @php ($c_prod = \App\Product::where('id',$cart_item->p_id)->get()->first())
        @php( ($cart_total += ($c_prod->Price - ($c_prod->Price/100*$c_prod->Discount)) * $cart_item->count) )
        @endforeach
        <tr class="cart_item">
            <div class="col-md-4 col-xs-4 nopadding">
          <td class="cart-product-name">
            <strong>Sepet Ara Toplamı</strong>
          </td>
          <td class="cart-product-name">
            <span class="amount">{{$cart_total}}  &#8378;</span>
          </td>
        </tr>
        <tr class="cart_item">
          <td class="cart-product-name">
            <strong>Kargo</strong>
          </td>

          <td class="cart-product-name">
            <span class="amount">Ücretsiz Kargo</span>
          </td>
        </tr>
        <tr class="cart_item">
          <td class="cart-product-name">
            <strong>Toplam</strong>
          </td>

          <td class="cart-product-name">
            <span class="amount color lead"><strong>{{$cart_total}}  &#8378;</strong></span>
          </td>
            </div>
</tr>
<tr class="cart_item">
<td>
    <a href="{{url('/clearcart')}}" class="button button-3d nomargin fright">SEPETİ TEMİZLE</a>
</td>
<td>
  <form class="" action="{{url('/checkout')}}" method="post">
    @csrf
    <button type="submit" class="button button-3d notopmargin fright">SİPARİŞİ TAMAMLA >> </button>
  </form>
</td>
</tr>
</tbody>

    </table>




  </div>
</div>

</div>
