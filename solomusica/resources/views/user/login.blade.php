<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="css/login.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
  <body>
    {!!Form::open(['route' => 'login.store', 'method' =>'POST']) !!}

        <img src="img/login/new.png" alt="" class="logo"><h1>SoloMúsica</h1>

        <input type="text" name="email" class="form-control" placeholder="Ingrese email" required="a">
        <input type="password" name="password"  class="form-control" placeholder="Contraseña" required="a">
        <button type="submit" class="btn btn-default" name="button">Iniciar sesión</button><br><br>
        <button type="button" class="btn btn-default"  id="btnface" name="button" >Inicia con facebook

        </button><br><br>
        <a href="">¿olvidaste tu contraseña?</a>
    {!!Form::close()!!}
  </body>
</html>
