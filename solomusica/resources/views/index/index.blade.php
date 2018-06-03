<!DOCTYPE html>
<html>
  <head>
		<link rel="shortcut icon" href="{{ asset('img/log.ico') }}" />
    <meta charset="utf-8">
    <title>Home</title>
    @include('index.components.linkHeader')
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
  </head>

  <body>

		@if (Auth::user()!=null)
			@include('partials.nav_2')
		@else
			@include('partials.nav_1')
		@endif


<!-- Page Content -->




<div class="container">


    <div class="row">

        <div class="col-lg-12 " id="title-header">
            <h1 class="page-header destacados">Destacados</h1>
        </div>
        @if (Auth::user()!==null)
          <input type="hidden" name="id-user" id="id-user" value="{{Auth::user()->id}}">

        @endif
        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">

<div class="makina">


@foreach ($images as $image)

        <div class="col-lg-3 col-md-4 col-xs-6 thumb " >
            <a class="thumbnail" href="#myModal" data-toggle="modal"  style="text-decoration:none" value="{{$image->publication_id}}" id="mostrar" onclick="Mostrar({{$image->publication_id}})">
                <img class="img-responsive" src="images/{{$image->images_route}}" alt="">
                  <p style="font-weight: bold;">{{ ucwords($image->name) }}</p>
                  {{-- <p class="precio" >  ${{$image->price}} CLP  </p> --}}
									 <p class="precio" >  ${{number_format($image->price, 0, ",", ".")}} CLP  </p>
            </a>
        </div>


@endforeach


<input type="hidden" name="id" id="id" >

    </div>

    </div>

<div id="paginar1">
  <div class="row">
      <div class="col-lg-12">
        {!!$images->render()!!}

      </div>
  </div>
</div>

    <!-- Footer -->


</div>



<!-- /.container -->

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
                            @if (Auth::user()!==null)
                              <div class="cont-fav">

                              </div>



                            @else
                              <button type="button" disabled="true"  class="btn btn-articulo btn-lg btn-block"><span class="icon icon-heart" style="padding:20px;"></span>Favoritos</button>

                            @endif

														{{-- <div class="fb-like" data-href="" data-layout="standard" data-action="recommend" data-size="large" data-show-faces="false" data-share="true"></div> --}}
														<br><br>
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
                        <li><a href="#" id="description-nav2" style="color:#fff;" >Descripción</a></li>
                        <li><a href="#" id="comments-nav2"style="color:#fff;">Comentarios</a></li>
                        <li><a href="#" id="about-nav2" style="color:#fff;">Acerca del vendedor</a></li>

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
<div id="fb-root"></div>
<script></script>





<!--<footer class="">
	<div class="footer-SM">
		<div class="row">
				<div class="col-lg-12 footer-SM">

		</div>
	</div>

</footer>-->

<!--<div class="fot_content">
	<div class="fot" id="fot">

	</div>
</div>
-->
<footer>
		<div class="container">
			<div class="row">

							 <div class="col-md-4 col-sm-6 col-xs-12">
								 <ul class="adress">
											<span>Síguenos en facebook</span>
<div class="f" style="position:relative">

									 <div id="fb-root"></div>
												<script>(function(d, s, id) {
													var js, fjs = d.getElementsByTagName(s)[0];
													if (d.getElementById(id)) return;
													js = d.createElement(s); js.id = id;
													js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=484448808559543';
													fjs.parentNode.insertBefore(js, fjs);
												}(document, 'script', 'facebook-jssdk'));</script>
								 <div class="footer">
									 <div class="fb-page"
										 data-href="https://www.facebook.com/Proyectotesissolomusica/"
										 data-width="300"
										 data-hide-cover=""
										 data-show-facepile="true"></div>
</div>
							</ul> </div>



							 <div class="col-md-4 col-sm-6 col-xs-12">
									 <ul class="menu">
												<span>Medios de pago</span>
												<li>
													<img style="background-size: 10% 10%;" src="{{ asset('index/img/khipu.png') }}" alt="">

												 </li>

												 <li>
													 <img style="height:100px;width:100px;" src="{{ asset('index/img/paypal.png') }}" alt="">
												 </li>

										</ul>
							 </div>

							 <div class="col-md-4 col-sm-6 col-xs-12">
								 <ul class="adress">
											 <span>Contacto</span>
											 <li>
													<i class="fa fa-phone" aria-hidden="true"></i> <a >+56966791516</a>
											 </li>

											 <li>
													<i class="fa fa-envelope" aria-hidden="true"></i> <a>solomúsicasm.2017@gmail.com</a>
											 </li>
									</ul>
							</div>


					</div>
			 </div>
	 </footer>

@include('index.components.linkFooter')




  </body>
</html>
