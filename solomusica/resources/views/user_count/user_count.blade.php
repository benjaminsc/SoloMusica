<!DOCTYPE html>
<html>
  <head>
		<link rel="shortcut icon" href="{{ asset('img/log.ico') }}" />
    <meta charset="utf-8">
    <title>Mi Cuenta</title>



<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@include('user_count.components.linkHeader')


  </head>

  <body >
    @include('partials.nav_3')

														@if(\Session::has('message'))
														@include('user_count.components.messagePayment')
														@php
															\Session::forget('message');
														@endphp
														@endif








    <div class="container con">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a style="font-weight: bold; text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="resumen"><span class="icon icon-menu">
                            </span>Resumen</a>
                        </h4>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a style="font-weight: bold; text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="icon icon-handshake-o">
                            </span>Mis ventas</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="" style="font-weight: bold; text-decoration:none" id="publications">Publicaciones</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="" style="font-weight: bold; text-decoration:none" id="sale">Ventas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
																				<a style="font-weight: bold; text-decoration:none"data-toggle="modal" data-target="#questionModal" onclick="questions_all({{ \Auth::User()->id}})">Preguntas</a>
																				<div class="notification notify">

																				</div>
																				@include('user_count.questions')
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a style="font-weight: bold; text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="icon icon-cart">
                            </span>Mis Compras</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <!--<tr>
                                    <td>
                                        <a href="">Compras</a>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td>
                                        <a style="font-weight: bold; text-decoration:none" data-toggle="modal" data-target="#responseModal" onclick="response_all({{ \Auth::User()->id}})">Respuestas</a>
																				@include('user_count.responses')
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a style="font-weight: bold; text-decoration:none" id="favorites">Favoritos</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
              <!--  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="icon icon-stats-dots">
                            </span>Mi reputación</a>
                        </h4>
                    </div>

                </div>-->
            </div>
        </div>
        <div class="col-sm-9 col-md-9">

            <div class="row" id="publication">


              </div>
            </div>
         </div>
       </div>
			<!-- <div id="fb-root"></div>
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
					data-width="270"
					data-hide-cover=""
					data-show-facepile="true"></div>
			</div>-->
			<footer>
					<div class="container">
						<div class="row">

										 <div class="col-md-4 col-sm-6 col-xs-12">
											 <ul class="adress">
														<span>Síguenos en facebook</span>
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
										 </ul>
										 </div>

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

@include('user_count.components.linkFooter')

  </body>
</html>
