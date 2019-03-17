<!-- Primary Navigation		============================================= -->
<nav id="primary-menu">

<ul>
  @foreach(\App\SitePage::all() as $page)
    @if($page->Type=='DefinedPage')
      @if($page->Value==0)
      <li class="current"><a href="{{url('/')}}"><div>{{$page->Title}}</div></a>	</li>
      @elseif($page->Value==1)
      <li><a href="{{url('/contact')}}"><div>{{$page->Title}}</div></a>	</li>
      @elseif($page->Value==2)
      <li class="mega-menu"><a href="{{url('/products')}}"><div>{{$page->Title}}</div></a>
        <div class="mega-menu-content style-2 clearfix">
          @foreach(\App\Category::all()->where('ParentCategory', 0)->take(4) as $cate)
          <ul class="mega-menu-column col-md-3">
            <li class="mega-menu-title"><a href="#"><div>{{$cate->Title}}</div></a>
              <ul>
                @foreach(\App\Category::all()->where('ParentCategory', $cate->id) as $scate)
                <li><a href="#"><div>{{$scate->Title}}</div></a></li>
                @endforeach
              </ul>
            </li>
          </ul>
          @endforeach
        </div>
      </li>
      @else
      <li><a href="{{url('/')}}"><div>{{$page->Title}}</div></a>	</li>
      @endif
    @elseif($page->Type=='PageHeader')
      <li><a href="{{url('/page/'.$page->id)}}"><div>{{$page->Title}}</div></a></li>
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
    </li> --><!-- .mega-menu end -->
</ul>

<!-- Top Cart	============================================= -->
<div id="top-cart">
<a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>2</span></a>
<div class="top-cart-content">
<div class="top-cart-title">
<h4>SEPET</h4>
</div>
<div class="top-cart-items">
<div class="top-cart-item clearfix">
<div class="top-cart-item-image">
<a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
</div>
<div class="top-cart-item-desc">
<a href="#">Erkek Mavi Tshirt</a>
<span class="top-cart-item-price">19.99 tl</span>
<span class="top-cart-item-quantity">x 1</span>
</div>
</div>
<div class="top-cart-item clearfix">
<div class="top-cart-item-image">
<a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue Denim Dress" /></a>
</div>
<div class="top-cart-item-desc">
<a href="#">Erkek Beyaz Tshirt</a>
<span class="top-cart-item-price">24.99 tl</span>
<span class="top-cart-item-quantity">x 1</span>
</div>
</div>
</div>
<div class="top-cart-action clearfix">
<span class="fleft top-checkout-price">44.98 tl</span>
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
