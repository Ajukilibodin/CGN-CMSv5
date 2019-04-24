<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('libraries.admin.head')
  </head>
  <body class="pace-top">
      @if ( Cookie::get('ajanlogin') )
      @include('libraries.admin.sidenav')
      <div class="page-wrapper chiller-theme toggled">
        <main class="page-content">
          <div class="container-fluid">
          @yield('contenttitle')
          @include('libraries.errorpopper')
          @yield('content')
          </div>
        </main>
      </div>
      @else
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade">
          <!-- begin login -->
          <div class="login bg-black animated fadeInDown">
            @yield('contenttitle')
            @include('libraries.errorpopper')
            @yield('content')

          </div>
          <!-- end login -->
        </div>
        <!-- end page container -->
      @endif
      
    @include('libraries.admin.footer-login')
  </body>
</html>
