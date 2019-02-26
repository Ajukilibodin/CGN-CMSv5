<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('libraries.adminhead')
  </head>
  <body>
    @yield('contenttitle')
    @include('libraries.errorpopper')
    @yield('content')
  </body>
</html>
