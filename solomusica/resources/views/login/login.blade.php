<!DOCTYPE html>
<html>
  <head>
		<link rel="shortcut icon" href="{{ asset('img/log.ico') }}" />
    <meta charset="utf-8">
    <title>Ingresar</title>
  </head>
  @include('login.components.linkHeader')
  <body>

				@if (\Session::has('message') )
					<div class="alert alert-warning alert-dismissible text-center alert_login" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<h2><strong><i class="fa fa-info-circle"></i></strong> {{ \Session::get('message') }}</h2>
					</div>
					@php
						Session::forget('message');
					@endphp
				@endif
    {!!Form::open(['route' => 'ingresar.store', 'method' =>'POST']) !!}

        <img src="login/img/new.png" alt="" class="logo"><h1>SoloMúsica</h1>

        <input type="email" name="email" class="form-control" placeholder="Ingrese email" required="a">
        <input type="password" name="password"  class="form-control" placeholder="Contraseña" required="a">
        <button type="submit" class="btn btn-default" name="button">Iniciar sesión</button> | <a class="btn btn-default" id="btnface" href="{{ route('login/facebook') }}"> Facebook
				</a>			<br><br>	<a href="http://localhost:8000/home" style="text-decoration:none;font-size:20px;<!--float:right;-->margin-bottom:2px;"><span class="form-group "><i class="glyphicon glyphicon-home"></i></span> Volver a home</a>
<br><a href="Forgot-Password" style="text-decoration:none; text-align:right;">¿Olvidate tú contraseña?</a>

			  <!-- <button type="button" class="btn btn-default"  id="btnface" name="button" >Inicia con facebook

        </button><br><br> -->




    {!!Form::close()!!}
@include('login.components.linkFooter')
  </body>
</html>
