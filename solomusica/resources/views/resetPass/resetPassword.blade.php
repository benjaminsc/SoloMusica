<!DOCTYPE html>
<html>
  <head>
		<link rel="shortcut icon" href="{{ asset('img/log.ico') }}" />
    <meta charset="utf-8">
    <title>¿Olvidaste tú contraseña?</title>
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
    {!!Form::open(['route' => 'postmail', 'method' =>'POST']) !!}

        <img src="login/img/new.png" alt="" class="logo"><h1>SoloMúsica</h1>


        <input type="text" name="email" class="form-control" placeholder="Ingrese email" required="a">
        <button type="submit" class="btn btn-default" name="button">Enviar link</button>			<br><br>	<a href="http://localhost:8000/home" style="text-decoration:none;font-size:20px;<!--float:right;-->margin-bottom:2px;"><span class="form-group "><i class="glyphicon glyphicon-home"></i></span> Volver a home</a>

    {!!Form::close()!!}
@include('login.components.linkFooter')
  </body>
</html>
