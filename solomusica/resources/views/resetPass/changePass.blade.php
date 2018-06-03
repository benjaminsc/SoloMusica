<!DOCTYPE html>
<html>
  <head>
		<link rel="shortcut icon" href="{{ asset('img/log.ico') }}" />
    <meta charset="utf-8">
    <title>Cambiar Contraseña</title>
  </head>
  @include('login.components.linkHeader')


	{{-- <link rel="stylesheet" href="{{asset('img/index/fonts/style.css')}}"> --}}
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>

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
    {!!Form::open(['route' => 'resetPassword', 'method' =>'POST']) !!}

        <img src="{{asset('login/img/new.png')}}" alt="" class="logo"><h1>SoloMúsica</h1>
				  <h2>Cambia tu contraseña</h2>
        <input type="hidden" name="email" value="{{ $email }}">
			  <input type="password" name="password"  class="form-control" placeholder="Contraseña" required="a">
        <input type="password" name="password2"  class="form-control" placeholder="Contraseña" required="a">
        <button type="submit" class="btn btn-default" name="button">Actualizar</button>
    {!!Form::close()!!}
@include('login.components.linkFooter')
  </body>
</html>
