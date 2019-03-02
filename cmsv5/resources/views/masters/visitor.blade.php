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
    <!-- Content	============================================= -->
    @if(Request::is('/'))
    <section id="content" class="topmargin nobottommargin">
      <div class="content-wrap nobottommargin">
    @else
    <section id="content">
      <div class="content-wrap topmargin bottommargin">
    @endif
        <div class="container clearfix">
          @yield('content')
        </div>
      </div>
    </section>
    @if(Request::is('/'))
      @include('libraries.footer.footer-index')
    @else
      @include('libraries.footer.footer')
    @endif
    @include('libraries.footer.base-js')
  </div>
</body>
</html>
