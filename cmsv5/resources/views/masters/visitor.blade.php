@include('libraries.head.head')
<body class="stretched">
  <div id="wrapper" class="clearfix">
    @include('libraries.topbar')
    @include('libraries.header')
    @if(Request::is('/'))
      @include('modules.slider')
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
