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
    @include('modules.cart.topbar-cart')



    <!-- Top Search		============================================= -->
    <div id="top-search">
        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
        <form action="search.html" method="get">
            <input type="text" name="q" class="form-control" value="" placeholder="YAZ &amp; ENTERA BAS">
        </form>
    </div>

</nav>
