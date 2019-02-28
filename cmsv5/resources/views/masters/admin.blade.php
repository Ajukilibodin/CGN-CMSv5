<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('libraries.adminhead')
  </head>
  <body>
    <div class="container">
      <div class="row">
        @if ( !Cookie::get('ajanlogin') )
        <div class="col-12">
          @yield('contenttitle')
          @include('libraries.errorpopper')
          @yield('content')
        </div>
        @else
        <div class="col-2">
          @include('libraries.adminsidenav')
        </div>
        <div class="col-10">
          @yield('contenttitle')
          @include('libraries.errorpopper')
          @yield('content')
        </div>
        @endif
      </div>
    </div>
  </body>
</html>
