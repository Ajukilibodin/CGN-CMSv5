<!-- Primary Navigation		============================================= -->
<nav id="primary-menu">

    <ul>
        @foreach(\App\SitePage::all() as $page)
        @if($page->Type=='DefinedPage')
        @if($page->Value==0)
        <li class="current"><a href="{{url('/')}}">
                <div>{{$page->Title}}</div>
            </a> </li>
        @elseif($page->Value==1)
        <li><a href="{{url('/contact')}}">
                <div>{{$page->Title}}</div>
            </a> </li>
        @elseif($page->Value==2)
        <li class="mega-menu"><a href="{{url('/category')}}">
                <div>{{$page->Title}}</div>
            </a>
            <div class="mega-menu-content style-2 clearfix">
                @foreach(\App\Category::where('ParentCategory', 0)->take(4)->get() as $cate)
                <ul class="mega-menu-column col-md-3">
                    <li class="mega-menu-title"><a href="{{url('/products/'.$cate->id)}}">
                            <div>{{$cate->Title}}</div>
                        </a>
                        <ul>
                            @foreach(\App\Category::where('ParentCategory', $cate->id)->get() as $scate)
                            <li><a href="{{url('/products/'.$scate->id)}}">
                                    <div>{{$scate->Title}}</div>
                                </a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                @endforeach
            </div>
        </li>
        @else
        <li><a href="{{url('/')}}">
                <div>{{$page->Title}}</div>
            </a> </li>
        @endif
        @elseif($page->Type=='PageHeader')
        <li><a href="{{url('/page/'.$page->id)}}">
                <div>{{$page->Title}}</div>
            </a></li>
        @endif
        @endforeach

        <!--

  <li class="mega-menu"><a href="#"><div>ERKEK</div></a>
  <div class="mega-menu-content style-2 clearfix">
  <ul class="mega-menu-column col-md-3">
  <li class="mega-menu-title"><a href="#"><div>GİYİM</div></a>
  <ul>
  <li><a href="#"><div>Ayakkabı</div></a></li>
  <li><a href="#"><div>T-shirt</div></a></li>
  <li><a href="#"><div>Sweat Shirt</div></a></li>
  <li><a href="#"><div>Pantalon</div></a></li>
  <li><a href="#"><div>Mont</div></a></li>
  <li><a href="#"><div>Termal İçlik</div></a></li>
  <li><a href="#"><div>Şort</div></a></li>
  </ul>
  </li>
  </ul>

  <ul class="mega-menu-column col-md-3">
  <li class="mega-menu-title"><a href="#"><div>EKİPMAN</div></a>
  <ul>
  <li><a href="#"><div>Ayakkabı</div></a></li>
  <li><a href="#"><div>T-shirt</div></a></li>
  <li><a href="#"><div>Sweat Shirt</div></a></li>
  <li><a href="#"><div>Pantalon</div></a></li>
  <li><a href="#"><div>Mont</div></a></li>
  <li><a href="#"><div>Termal İçlik</div></a></li>
  <li><a href="#"><div>Şort</div></a></li>
  </ul>
  </li>
  </ul>

  <ul class="mega-menu-column col-md-3">
  <li class="mega-menu-title"><a href="#"><div>SPOR</div></a>
  <ul>
  <li><a href="#"><div>Ayakkabı</div></a></li>
  <li><a href="#"><div>T-shirt</div></a></li>
  <li><a href="#"><div>Sweat Shirt</div></a></li>
  <li><a href="#"><div>Pantalon</div></a></li>
  <li><a href="#"><div>Mont</div></a></li>
  <li><a href="#"><div>Termal İçlik</div></a></li>
  <li><a href="#"><div>Şort</div></a></li>
  </ul>
  </li>
  </ul>
  <ul class="mega-menu-column col-md-3">
  <li class="mega-menu-title"><a href="#"><div>OUTLET</div></a>
  <ul>
  <li><a href="#"><div>Ayakkabı</div></a></li>
  <li><a href="#"><div>T-shirt</div></a></li>
  <li><a href="#"><div>Sweat Shirt</div></a></li>
  <li><a href="#"><div>Pantalon</div></a></li>
  <li><a href="#"><div>Mont</div></a></li>
  <li><a href="#"><div>Termal İçlik</div></a></li>
  <li><a href="#"><div>Şort</div></a></li>
  </ul>
  </li>
  </ul>

      </div>
    </li>
    <li><a href="#"><div>KADIN</div></a>
      <div class="mega-menu-content style-2 clearfix">
        <ul class="mega-menu-column col-md-6">
          <li class="mega-menu-title"><a href="#"><div>GİYİM</div></a>
            <ul>
              <li><a href="#"><div>Ayakkabı</div></a></li>
              <li><a href="#"><div>T-shirt</div></a></li>
              <li><a href="#"><div>Sweat Shirt</div></a></li>
              <li><a href="#"><div>Pantalon</div></a></li>
              <li><a href="#"><div>Mont</div></a></li>
              <li><a href="#"><div>Termal İçlik</div></a></li>
              <li><a href="#"><div>Şort</div></a></li>
            </ul>
          </li>
        </ul>
        <ul class="mega-menu-column col-md-6">
          <li class="mega-menu-title"><a href="#"><div>EKİPMAN</div></a>
            <ul>
              <li><a href="#"><div>Ayakkabı</div></a></li>
              <li><a href="#"><div>T-shirt</div></a></li>
              <li><a href="#"><div>Sweat Shirt</div></a></li>
              <li><a href="#"><div>Pantalon</div></a></li>
              <li><a href="#"><div>Mont</div></a></li>
              <li><a href="#"><div>Termal İçlik</div></a></li>
              <li><a href="#"><div>Şort</div></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </li> -->
        <!-- .mega-menu end -->
    </ul>

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
                @php($carttotal+=( $c_prod->Price - ($c_prod->Price/100*$c_prod->Discount) )*$cart_item->count )
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
                        <span class="top-cart-item-price">{{$c_prod->Price - ($c_prod->Price/100*$c_prod->Discount)}} TRY</span>
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



    <!-- Top Search		============================================= -->
    <div id="top-search">
        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
        <form action="search.html" method="get">
            <input type="text" name="q" class="form-control" value="" placeholder="YAZ &amp; ENTERA BAS">
        </form>
    </div>

</nav>
