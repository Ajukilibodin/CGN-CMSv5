<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('libraries.head')
  </head>
  <body>
    @include('libraries.topbar')
    @include('libraries.navbar')
    @yield('content')
    @include('libraries.footer')
  </body>
</html>
