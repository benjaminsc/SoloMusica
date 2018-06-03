<!DOCTYPE html>
<html>
  <head>
		<link rel="shortcut icon" href="{{ asset('img/log.ico') }}" />
    <meta charset="utf-8">
    <title>Registro</title>
    @include('register.components.linkHeader')

  </head>
  <body>
    <div class="contenedor1">
      {!! Form::open(['route' => 'registro.store', 'method' => 'POST']) !!}
        <h2>Registro</h2>
        <input type="text" name="name" id="name"class=" form-control input-texto 1" placeholder="Nombre" required="">
        <input type="text" name="lastname" id="lastname" class="form-control input-texto 2" placeholder="Apellido" required="">
        <input type="text" name="email"id="email" class="form-control input-texto 3" placeholder="E-mail" required="">
  			<input type="number" maxlength="12"name="phone" id="phone"class="form-control input-texto 4" required="true" placeholder="Telefono">
        <input type="password" name="password" id="password"class="form-control input-texto 5" placeholder="Clave" required="">

      <!--  <a href="{{route('payment2')}}">pagar con paypal</a>
        <a href="{{route('khipu2')}}">pagar con khipu</a>-->
        <!--<input type="hidden"  name="userprofile_id" value="1">-->
        <div class="checkbox">
        <label><input  type="checkbox" id="userprofile_id" name="userprofile_id"  onclick="postRegister()" value="1">Soy Micro-Empresa</label>
        <div id="informacion"></div>
        </div>
        {{--boton de registro --}}
        <div id="btnRegistro">
          <input type="submit" class="btn btn-default" value="Registrarme!">
          <a id="home" href="http://localhost:8000/home" style="text-decoration:none;font-size:20px;float:right;margin-bottom:2px;"><span class="form-group "><i class="glyphicon glyphicon-home"></i></span> Volver a home</a>

        </div>


      {!! Form::close() !!}
      {{-- botones de pago --}}

      <div class="row" id="btnPagos"></div>
      <div class="row" id="btn-home"></div>

@include('register.components.linkFooter')
  </body>
</html>
