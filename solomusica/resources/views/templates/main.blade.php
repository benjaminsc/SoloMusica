<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!--esttilos para esta plantilla-->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">


  </head>
  <body>
    <header>
      @include('templates.partials.nav')
    </header>

    @yield('content')
  </body>
</html>
