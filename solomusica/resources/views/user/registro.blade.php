<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
      <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/registro.css')}}">

  </head>
  <body>
    {!! Form::open(['route' => 'registro.store', 'method' => 'POST']) !!}
      <h2>Registro</h2>
      <input type="text" name="name" class="form-control" placeholder="Nombre" required="">
      <input type="text" name="lastname" class="form-control" placeholder="Apellido" required="">
      <input type="text" name="email" class="form-control" placeholder="E-mail" required="">
      <input type="password" name="password" class="form-control" placeholder="Clave" required="">
      <input type="submit" class="btn btn-default" value="Registrarme!">
    {!! Form::close() !!}
  </body>
</html>
