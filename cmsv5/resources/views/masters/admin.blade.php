<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('libraries.adminhead')
  </head>
  <body>
    <div class="page-wrapper chiller-theme toggled">
      @if ( Cookie::get('ajanlogin') )
      @include('libraries.adminsidenav')
      <main class="page-content">
        <div class="container-fluid">
        @yield('contenttitle')
        @include('libraries.errorpopper')
        @yield('content')
        </div>
      </main>
      @else
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
          @yield('contenttitle')
          @include('libraries.errorpopper')
          @yield('content')
        </div>
        <div class="col-1"></div>
      </div>
      @endif
      <!-- page-content" -->
    </div>
    @include('libraries.adminfooter')
  </body>
</html>