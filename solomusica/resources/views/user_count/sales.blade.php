@foreach ($imag as $img)

  <div class="col-lg-3 col-md-4 col-xs-6 thumb"  id="contenedor" >
    <a href="#" class="thumbnail" style="text-decoration:none;  ">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" id="category" name="category" value="">
        <input type="hidden" id="sector1" name="sector1" >
        <input type="hidden" id="id" name="id" >

<span class=""><img src="user_count/img/sold.png" style="width:70px"></span>
<span class="" onclick="marcarDisponible({{$img->publication_id}})"><img src="user_count/img/live2.png" alt="" title="Marcar disponible" style="	float: right;"></span>
        <img class="img-responsive" src="images/{{$img->images_route}}" alt="">
				<label for="">{{ $img->name }}</label>
<div class="delete-modify">

											{{-- marcarDisponible(id) --}}
</div>




</a>
  </div>







@endforeach
