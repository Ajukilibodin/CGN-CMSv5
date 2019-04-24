<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('libraries.admin.head')
  </head>
  @if ( Cookie::get('ajanlogin') )
  <body>
  @else
  <body class="pace-top">
  @endif
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

      @if ( Cookie::get('ajanlogin') )
      <!-- begin #page-container -->
      <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

        @include('libraries.admin.header')

        @include('libraries.admin.sidenav')

        <!-- begin #content -->
    		<div id="content" class="content">
          @yield('contenttitle')
          @include('libraries.errorpopper')
          @yield('content')
      	</div><!-- end #content -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
      </div>
      <!-- end page container -->
      @else
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

    @if ( Cookie::get('ajanlogin') )
    @include('libraries.admin.footer-admin')
    @else
    @include('libraries.admin.footer-login')
    @endif
  </body>
</html>
