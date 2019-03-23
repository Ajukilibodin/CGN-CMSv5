<div class="table-responsive bottommargin">
  <table class="table cart">
    <tbody>
      <form action="{{url('/updatecart')}}" method="post">
        @csrf
        @php($count=1)
        @foreach(json_decode(\Cookie::get('customercart')) as $cart_item)
        <input type="text" name="cart_item{{$count}}" value="{{json_encode($cart_item)}}" hidden>
        @php ($c_prod = \App\Product::where('id',$cart_item->p_id)->get()->first())
        <tr class="cart_item">
          <td class="cart-product-remove">
            <a href="/delcart/{{$c_prod->id}}" class="remove" title="Ürünü Sepetten Kaldır"><i class="icon-trash2"></i></a>
          </td>
          @php($imagepath = $c_prod->ImgPaths)
          @if(strpos($imagepath,','))
          @php($imagepath = substr($imagepath, 0 ,strpos($imagepath,',')))
          @endif
          <td class="cart-product-thumbnail">
            <a href="/product/{{$c_prod->id}}"><img width="64" height="64" src="/uploads/modules/product/{{$imagepath}}" alt="{{$c_prod->Title}}"></a>
          </td>

          <td class="cart-product-name">
            <a href="#">{{$c_prod->Title}} ({{$cart_item->type}})</a>
          </td>

          <td class="cart-product-price">
            <span class="amount">{{$c_prod->Price - ($c_prod->Price/100*$c_prod->Discount)}}  &#8378;</span>
          </td>

          <td class="cart-product-quantity">
            <div class="quantity clearfix">
              <input type="button" value="-" class="minus" onclick="chnVal{{$count}}(-1)">
              <input type="text" step="1" min="1" id="p_quantity{{$count}}" name="p_quantity{{$count}}" value="{{$cart_item->count}}" title="Qty" class="qty" size="4" />
              <input type="button" value="+" class="plus" onclick="chnVal{{$count}}(1)">
              <script type="text/javascript">
              <?php echo "function chnVal".$count."(num)"; ?>
              {
                var value = parseInt(document.getElementById('p_quantity{{$count}}').value, 10);
                value+=num;
                if(value < 1) value = 1;
                document.getElementById('p_quantity{{$count}}').value = value;
              }
              </script>
            </div>
          </td>

          <td class="cart-product-subtotal">
            <span class="amount">{{($c_prod->Price - ($c_prod->Price/100*$c_prod->Discount)) * $cart_item->count}} &#8378;</span>
          </td>
        </tr>
        @php($count++)
        @endforeach
        <input type="number" name="cartcount" value="{{$count-1}}" hidden>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <button class="button button-3d nomargin fright">SEPETİ GÜNCELLE</button>
          </td>
          <td></td>
        </tr>

      </form>
    </tbody>
  </table>
</div>
