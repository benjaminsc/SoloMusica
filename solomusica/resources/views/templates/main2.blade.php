<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!--Estilos para esta plantilla -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

  </head>

  <body>
    <header>
      @include('templates.partials.nav')
    </header>
    @yield('content')





    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src='js/publicar.js'>  </script>


  </body>
</html>
