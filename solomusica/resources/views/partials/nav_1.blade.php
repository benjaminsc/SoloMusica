
<header>
<nav >
    <ul>
            <a href="http://localhost:8000/home" onClick="window.location = 'http://localhost:8000/home';" style="text-decoration:none;"><li><img src="{{ asset('index/img/logo.png') }}" class="logo"><span class="solomusica">SoloMúsica</span></li></a>
        <li><a href="#"><span class="primero"><i class="icon icon-books"></i></span>Categorías</a>

            <ul>
                <li><a href="#" onclick="image_piano()">Pianos y Teclados</a></li>
                <li><a href="#" onclick="image_guitarra()">Guitarras</a></li>
                <li><a href="#" onclick="image_bajo()">Bajos</a></li>
                <li><a href="#" onclick="image_bateria()">Baterías</a></li>
								<li><a href="#" onclick="image_accesorios()">Accesorios</a></li>
              <!--  <li><a href="#">Más</a></li>-->
            </ul>
        </li>
            <div class="form-group busqueda">
                <input type="text"  class="form-control"  placeholder="Buscar" id="resultado" style="width:500px;"minLength="1" required="true">
<!--                <button type="button" class="btn btn-default " color="black">Buscar</button>
-->
            </div>

        <li><a onClick="window.location = 'http://localhost:8000/registro/create';"><span class="segundo"><i class="icon icon-handshake-o"></i></span>Registrate </a></li>
        <li><a onClick="window.location = 'http://localhost:8000/ingresar';"><span class="tercero"><i class="icon icon-user"></i></span>Iniciar Sesión</a></li>
    </ul>
</nav>
</header>
