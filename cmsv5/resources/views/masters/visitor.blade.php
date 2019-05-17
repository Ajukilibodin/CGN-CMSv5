@include('libraries.head.head')
<body class="stretched">
  <div class="alert text-center cookiealert" role="alert">
   <b>Bu web sayfasında size daha etkili hizmet verebilmek adına cookie kullanılmaktadır. </b>
   &#x1F36A; <a href="https://cookiesandyou.com/" target="_blank">Cookie Nedir?</a>

   <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
       Kabul Ediyorum
   </button>
  </div>

  <div id="wrapper" class="clearfix">
    @include('libraries.topbar')
    @include('libraries.header')
    @if($message = Session::get('welcomemessage'))
    <div class="alert alert-success" style="width:50%; float:right; left: -25%; position: relative; margin:5px 5px 5px 5px;">
      {{$message}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if(Request::is('/'))
      @include('modules.slider.slider')
    @else
      @include('libraries.page-title')
    @endif

    @yield('content')

    @if(Request::is('/'))
      @include('libraries.footer.footer-index')
    @elseif(Request::is('login'))
      @include('libraries.footer.footer-min')
    @else
      @include('libraries.footer.footer')
    @endif
    @include('libraries.footer.base-js')
  </div>
</body>
</html>
