@foreach ($images as $image)

  <div class="col-lg-3 col-md-4 col-xs-6 thumb"  id="contenedor" >
    <a href="#" class="thumbnail" style="text-decoration:none;  ">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" id="category" name="category" value="">
        <input type="hidden" id="sector1" name="sector1" >
        <input type="hidden" id="id" name="id" >
				<input type="hidden" name="cantView" value="">

<span  id="btnMarcar" onclick="marcarVendido({{$image->publication_id}})"><img src="user_count/img/imgV.png" alt="" title="Marcar como vendido"><button type="button" name="button" ondblclick=""></button></span>
{{-- <span  id="btnCompartir" onclick=""><img src="user_count/img/shareFacebook.png" alt="" title="Compartir"></span> --}}

{{-- <a href="javascript: void(0);"onclick="window.open('http://www.facebook.com/sharer.php?u=http://localhost:8000/home/share/{{ $image->publication_id }}','popup', 'toolbar=0, status=0, width=650, height=450');"> --}}
<img id="btnCompartir" title="Compartir en Facebook" src="{{ asset('user_count/img/share1.1.png') }}" alt="Compartir en Facebook" style="margin-left: 10px" href="javascript: void(0);"onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.localhost:8000/home/share/{{ $image->publication_id }}','popup', 'toolbar=0, status=0, width=650, height=450');"/>
{{-- </a> --}}


@if ($image->cantView==0)
	<span  id="cantView"><img src="user_count/img/anyview3.png" alt="" title="Cantidad de visitas"> {{ $image->cantView }}</span>
@else
	<span  id="cantView"><img src="user_count/img/eye3.png" alt="" title="Cantidad de visitas"> {{ $image->cantView }}</span>
@endif
        <img class="img-responsive" src="images/{{$image->images_route}}" alt="">

<div class="delete-modify">

  <button type="button" name="button" class=" btn btn-primary btn-xs" id="mostrar"  value="{{$image->publication_id}}" onclick="Mostrar(this)" data-toggle="modal" data-target="#myModalEditar">Modificar</button>
	@if ($image->type=="premium")
		<img src="user_count/img/imgP.png" alt="" title="Premium">

@elseif ($image->type=="gratis" && $image->userprofile_id=="1" )
	  <button type="button" id="btnSubir" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#pagoModal" value="{{$image->publication_id}}" onclick="postPayment(this)">Subir</button>
  @elseif ($image->type=="gratis" && $image->userprofile_id=="2" && $image->pubAmount<12)
    <span class="span-subir">
      <button type="button" id="btnSubir2" class="btn btn-warning btn-xs"   value="{{$image->publication_id}}" onclick="updatesubir2(this);">Subir</button>
    </span>
@else
    <button type="button" id="btnSubir" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#pagoModal" value="{{$image->publication_id}}" onclick="postPayment(this)">Subir</button>

	@endif
	@if ($image->type=="gratis")
		<button type="button" name="button" class="btn btn-danger btn-xs" id="btn-delete" value="{{$image->publication_id}}" onclick="Delete(this)" >Eliminar</button>
	@else
		<button type="button" name="button" class="btn btn-danger btn-xs" id="btn-delete" value="{{$image->publication_id}}" onclick="UPdate_estado({{ $image->publication_id }})" >Eliminar</button>
	@endif

</div>




</a>
  </div>







@endforeach

<!-- Modal Editar-->
<div class="modal fade" id="myModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificación de Artículo</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid" role="tabpanel" id="step1">

        <div class="col-md-6">
                <div class="form-group">

                  <label for="">Titulo:</label>
                  <input type="text" name="title" id="title"  class="form-control" ><br>
                  <label for="">Precio:</label><br>
                  <input type="number" name="price" id="price" value="" class="form-control"><br>
                  <label for="">Cantidad:</label><br>
                  <input type="number" name="quantity" id="quantity" value="" class="form-control"><br>
                  </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">

                  <label for="">Región:</label><br>
                  <select class="form-control" name="region" id="region">
                    <option value="0" disabled="">Seleccione región</option>
                    @foreach ($regions as  $region)
                      <option value="{{$region['id']}}">{{$region['name']}}</option>
                    @endforeach
                  </select><br>
                  <label for="">Comuna:</label>
                  <select class="form-control" name="sector" id="sector">
                    <option value="" disabled>Seleccione comuna</option>

                  </select><br>
                  <label for="">Descripción</label><br>
                  <textarea name="description" rows="6" id="description" cols="80" class="form-control"></textarea>
                </div>

        </div>

        </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cerrar</button>
        <button type="button"  id="actualizar"  onclick="Update(this)"class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div><!--fin modal editar-->


<!-- Modal postPayment-->
<div class="modal fade" id="pagoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 	<div class="modal-dialog" role="document">
	 	<div class="modal-content">
		 	<div class="modal-header">
			 	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			   	<h4 class="modal-title" id="myModalLabel">Destaca tu publicación y vende más rapido</h4>
		       	</div>
		         	<div class="modal-body">
			          <h3 id="titulo" name"titulo">Titulo</h3>

				         <img class="img-responsive" src="" id="imgPay"alt="">

							 	<h2>Valor: $2000</h2>
					 	 		<h3>Usa tu medio de pago favorito</h3>
					 			</div>
								<div class="modal-footer">
								<div class="">
									<div class="" id="khipu">
										<div class="" id="resultado"></div>
									</div>
								</div>

								<button type="button" class="btn btn-default btn-xs" onclick="document.location = '{{ route('payment',$image->publication_id)  }}'">
							 	<img src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/silver-pill-paypalcheckout-60px.png" alt="PayPal Checkout">
								</button>
		 						</div>
	 							</div>
 								</div>
</div>
{{-- fin de modal postPayment --}}


<script type="text/javascript">
$("#region").change(function(event) {

  $.get("sectors/" + event.target.value + "", function(response, region) {

    $("#sector").empty();
    response.forEach(element => {
      $("#sector").append(`<option value=${element.id}> ${element.name} </option>`);
    });
  });
});







</script>
