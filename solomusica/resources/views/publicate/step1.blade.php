<div class="tab-pane active" role="tabpanel" id="step1">
		<div class="col-md-12">
					<h3 class="">Paso 1 : Escoge la categoría de tu Artículo</h3><hr>
		</div>
<div class="col-md-6">

			{{--sección de categorias  --}}


			<div class="container">

	        <div class="row-height">



	            <div class="col-lg-3 col-md-3 col-xs-6 thumb">

	                <a class="thumbnail f-right btn next-step" data-toggle="" onclick="setCat({{ 1 }})">
	                    <img class="img-responsive" src="publicate/img/saxo2.jpg" alt="">
	                    <p class="categoria">
	                        Instrumento de Viento
	                    </p>

	                </a>
	            </div>
	            <div class="col-lg-3 col-md-3 col-xs-6 thumb">

	                <a class="thumbnail f-right btn next-step" data-toggle=""onclick="setCat({{ 2 }})">
	                    <img class="img-responsive" src="publicate/img/guitarra3.jpg" alt="">
	                    <p class="categoria">
	                        Instrumento de Cuerda
	                    </p>

	                </a>
	            </div>
	            <div class="col-lg-3 col-md-3 col-xs-6 thumb">

	                <a  class="thumbnail f-right btn next-step"  data-toggle="" onclick="setCat({{ 3 }})">
	                    <img class="img-responsive" src="publicate/img/bateria5.jpg"  alt="">
	                    <p class="categoria">
	                        Instrumento de Percusión
	                    </p>

	                </a>
	            </div>
							<div class="col-lg-3 col-md-3 col-xs-6 thumb">

								 <a  class="imagen-cat thumbnail f-right btn next-step"  data-toggle=""  onclick="setCat({{ 4 }})">
										 <img class="img-responsive" src="publicate/img/micro.jpg"  alt="">
										 <p class="categoria">
												 Accesorios
										 </p>

								 </a>
						 </div>
	        </div>
	    </div>
			<input type="hidden" name="category" id="category" value="">

			{{-- fincategorias --}}

</div>

<div class="col-md-12">
{{-- <button type="button" class="f-right btn btn-primary next-step">Continue</button> --}}
{{-- <button onclick="location.reload()" type="button" class="f-right m-10 btn btn-danger">Cancel</button> --}}
<input type="button" class="f-right m-10 btn btn-primary"value="Volver a home" onClick="window.location = 'http://localhost:8000/home';">
<br/><br/><br/><br/> </div>
</div>
