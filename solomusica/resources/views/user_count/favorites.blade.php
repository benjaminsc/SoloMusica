

@if (Auth::user()!==null)
  <input type="hidden" name="id-user" id="id-user" value="{{Auth::user()->id}}">

@endif
<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
@foreach ($favorites as $favorite)
	<div class="col-lg-3 col-md-4 col-xs-6 thumb " >
	              <a class="thumbnail"  href="#myModal" data-toggle="modal"  style="text-decoration:none" >
	                <span class=""><img src="user_count/img/2.png" alt="" title="eliminar de favoritos" onclick="Delete_favorites({{ $favorite->id }})"></button></span>
	                <div class="" value="{{$favorite->publication_id}}" id="mostrar" onclick="MostrarFavoritos({{$favorite->publication_id}})">



	                  <img class="img-responsive" src="images/{{$favorite->images_route}}" alt="">
	                    <p style="font-weight: bold;">{{$favorite->name}}</p>
	                    <p class="precio" >  ${{number_format($favorite->price, 0, ",", ".")}} CLP  </p>

	  </div>
	              </a>
	          </div>

@endforeach
<input type="hidden" name="id" id="id" >


<!---VENTANA MODAL- -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--header de la ventana (EN ESTA OCACION NO SE OCUPARA)
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Bajo ibanez Gio soundgear</h3>
      </div>-->
            <!--contenido de la ventana-->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7">

                          <div id="myCarousel" class="carousel slide" data-ride="carousel">


                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" id="xdd">
                              <div class="item active item2">

                              </div>

                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>


                        </div>

                        <div class="col-md-5">
                            <h3><p class="text-center " id="title" style="text-transform: capitalize;"></p></h3>
                            <h3 class="precio-articulo"><p class="text-center" id="precio" id="precio"  ></p></h3>
                            <p class="text-center" id="region-sector"></p>
                            <p class="text-center" id="quantity"></p><br>





														<br><br><br><br>
														<div class="content-fce">

														</div>
													 <div class="fce"></div>
                        </div>



                    </div>
                    <!--aqui-->



                </div>


            </div>
            <!--footer de la ventana-->
            <div class="modal-footer">


              <div class="container-fluid">
                <nav class="navbar navbar-default navbar-inverse" style="width:450px;">
                  <div class="container-fluid" >
                    <div class="collapse navbar-collapse ">
                      <ul class="nav navbar-nav ">
                        <li><a href="#" onclick="description();" id="description-nav2" style="color:#fff;" >Descripción</a></li>
                        <li><a href="#" onclick="comments();" id="comments-nav2"style="color:#fff;">Comentarios</a></li>
                        <li><a href="#" onclick="about();" id="about-nav2" style="color:#fff;">Acerca del vendedor</a></li>

                      </ul>
                    </div>
                  </div>
                </nav>
                <div class="row">
                  <div class="contenido " style="width:650px; margin:auto;">



                  </div>
                  <div class="col-lg-12 x2 div_comm"   >


                  </div>

                </div>
              </div>
            <!--  <nav class="navbar navbar-default navbar-inverse" style="width:450px;">
                <div class="container-fluid" >
                  <div class="collapse navbar-collapse ">
                    <ul class="nav navbar-nav ">
                      <li><a href="#" style="color:#fff;" >Descripción</a></li>
                      <li><a href="#" style="color:#fff;">Comentarios</a></li>
                      <li><a href="#" style="color:#fff;">Acerca del vendedor</a></li>

                    </ul>
                  </div>
                </div>
              </nav>-->
            </div>
        </div>
    </div>
</div><!--fin-->
