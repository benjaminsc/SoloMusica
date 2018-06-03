<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="{{ asset('img/log.ico') }}" />
		<meta charset="utf-8">
		<title>Página no encontrada</title>
			<link rel="stylesheet" href="/plugins/css/bootstrap.min.css">
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
			<link rel="stylesheet" href="{{ asset('css/404.css') }}">
			<link rel="stylesheet" href="{{ asset('css/404style.css') }}">
	</head>
	<body>
		<div class="row">
		<div class="flex-center position-ref full-height col-md-6">



					 <svg class="overlay text" viewBox="0 0 900 400">
		<symbol id="main">
			<text text-anchor="middle" x="50%" y="50%" dy="0.25em" class="txt">404</text>
      <text text-anchor="middle" x="50%" y="90%" dy="0.25em" class="txt2">Página no encontrada</text>
		</symbol>
		<mask id="msk" maskunits="userSpaceOnUse" maskcontentunits="userSpaceOnUse">
			<rect width="100%" height="100%" class="wrap">
			</rect>
			<use xlink:href="#main" class="mtxt"></use>
		</mask>
	</svg>
			<section>
				<h1 href="#">
					<div class="fill">
<canvas id="canv" width = "800" height = "660" style=background: hsla(0, 0%, 0%, 1);>
</canvas>
					</div>
					<svg viewBox="0 0 100% 100%" class="inv">
						<rect width="100%" height="100%" mask="url(#msk)"
      class="rect" />
						<use xlink:href="#main" class="clear"></use>
					</svg>
				</h1>
			</section>
			 </div>

			 <a class="backP" href="http://localhost:8000/home" style="text-decoration:none"> &laquo; <label for="">Vuelve a </label><label for="" style="color:#F55F02">SoloMusica</label></a>
			 </div>
			 <script src="{{ asset('js/404.js') }}" charset="utf-8"></script>
	</body>
</html>
