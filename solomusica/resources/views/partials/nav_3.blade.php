
<header>
<nav >
    <ul>
            <a href="http://localhost:8000/home" style="text-decoration:none;"><li><img src="{{ asset('index/img/logo.png') }}" class="logo"><span class="solomusica">SoloMúsica</span></li></a>
      <!--  <li><a href="#"><span class="primero"><i class="icon icon-books"></i></span>Categorias</a>

            <ul>
                <li><a href="#" onclick="image_piano()">Pianos y Teclados</a></li>
                <li><a href="#" onclick="image_guitarra()">Guitarras</a></li>
                <li><a href="#" onclick="image_bajo()">Bajos</a></li>
                <li><a href="#" onclick="image_bateria()">Baterias</a></li>
              {{-- <!--  <li><a href="#">Más</a></li>--> --}}
            {{-- </ul> --}}
        {{-- </li> --}}
            {{-- <!--<div class="form-group busqueda"> --}}
                <input type="text"  class="form-control"  placeholder="Buscar" id="resultado" style="width:500px;">
{{-- <!--                <button type="button" class="btn btn-default " color="black">Buscar</button> --}}
-->
            {{-- </div>--> --}}
				<li><a href="http://localhost:8000/publicar"><span class="tercero"><i class="icon glyphicon glyphicon-music"></i></span>Publicar</a></li>
				<li><a href="http://localhost:8000/micuenta"><span class="segundo"><i class="icon icon-user"></i></span>Bienvenido {{Auth::user()->name }}</a></li>
				<li><a href="http://localhost:8000/logout"><span class="tercero"><i class=" icon glyphicon glyphicon-log-out"></i></span>Cerrar sesión</a></li>

    </ul>
</nav>
</header>
