<!-- Top Cart	============================================= -->
<div id="top-cart">
  @if($temp_cart_array = json_decode(\Cookie::get('customercart')))
    @php( $c_count = count( $temp_cart_array ) )
  @else
    @php( $c_count = 0 )
  @endif
    <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>{{$c_count}}</span></a>
    <div class="top-cart-content">
        <div class="top-cart-title">
            <h4>SEPET</h4>
        </div>
        <div class="top-cart-items">
          @php($carttotal = 0)
          @if($c_count>0)
          @foreach(json_decode(\Cookie::get('customercart')) as $cart_item)
            @php ($c_prod = \App\Product::where('id',$cart_item->p_id)->get()->first())
            @php($fiyatTR = $c_prod->Price * $c_prod->Exchange->Multipler)
            @php($carttotal+=( round( $fiyatTR - ($fiyatTR/100*$c_prod->Discount) ,2) )*$cart_item->count )
            @php($imagepath = $c_prod->ImgPaths)
            @if(strpos($imagepath,','))
            @php($imagepath = substr($imagepath, 0 ,strpos($imagepath,',')))
            @endif
            <div class="top-cart-item clearfix">
                <div class="top-cart-item-image">
                    <a href="{{url('/product/'.$c_prod->id)}}">
                      <img src="{{url('/uploads/modules/product/'.$imagepath)}}" alt="{{$c_prod->Title}}" /></a>
                </div>
                <div class="top-cart-item-desc">
                    <a href="{{url('/product/'.$c_prod->id)}}">{{$c_prod->Title}} ({{$cart_item->type}})</a>
                    <span class="top-cart-item-price">{{round( $fiyatTR - ($fiyatTR/100*$c_prod->Discount) ,2)}} TRY</span>
                    <span class="top-cart-item-quantity">x {{$cart_item->count}}</span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="top-cart-action clearfix">
            <span class="fleft top-checkout-price">{{$carttotal}} TRY</span>
            <button class="button button-3d button-small nomargin fright" onclick="sepetegit();">SEPETE GİT</button>
        </div>
    </div>
</div>
