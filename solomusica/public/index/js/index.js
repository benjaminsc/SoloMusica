/*cargarfooter();
function cargarfooter() {
	/*document.getElementById("#fot").innerHTML = "";*/
/*  $("#fot").load("show_footer");

}*/
function description(){
  $(".comentario").remove();
  $(".contenedor").remove();
  $(".about").remove();
  $(".x2").removeClass('div_comm');


  var id =  $("#id").val();
  var route = "http://localhost:8000/data_nav2/"+id+"";
  $.get(route, function(res){
    if ( $(".descripcion").length > 0 ) {

    }else{
      $(".contenido").append('<p class="text-left descripcion" >'+res[0].description+'</p>');
    }


 });
}
function comments(){
  $(".descripcion").remove();
  $(".about").remove();

  if ($(".comentario").length > 0) {

  }else{
    $(".contenido").append('<p class="text-left comentario">Pregunta:</p>');
    $(".contenido").append('<textarea class="form-control comentario" id="com" rows="2" ></textarea>');
    $(".contenido").append('<button style="margin-top:3px;" type="button" class="btn btn-warning comentario" onclick="insert_question()">Comentar</button>');

  }
var id =  $("#id").val();
var route = "http://localhost:8000/comments/"+id+"";
  $.get(route, function(res){

  if ($(".contenedor").length > 0) {

  }else{
    $(".x2").addClass('div_comm');
    for (var i = 0; i < res.length; i++) {

      if (res[i].response != null) { // aqui debemos validar si viene la respuesta para mostar o no el div de la respuesra con la clase r
        $(".x2").append('<div class="contenedor "><div class="pregunta"><p class="p">'+res[i].question+'</p></div><div class="respuesta"><p class="r">'+res[i].response+'</p></div></div>');

      }else {
        $(".x2").append('<div class="contenedor "><div class="pregunta"><p class="p">'+res[i].question+'</p></div></div>');

      }
    }
  }

  });

}

function about(){
  $(".descripcion").remove();
  $(".comentario").remove();
  $(".contenedor").remove();
  $(".x2").removeClass('div_comm');



  var id1 =  $("#id").val();
  var route = "http://localhost:8000/about/"+id1+"";
  $.get(route, function(res){
    console.log(res);
    if ( $(".about").length > 0 ) { //about-nav2 existe?

    }else{

      $(".x2").removeClass('div_comm');
      $(".contenido").append('<label class="col-lg-2 control-label about">Vendedor:</label><p class="text-left about" >'+res[0].name+" "+res[0].lastname+'</p>');
      $(".contenido").append('<label class="col-lg-2 control-label about">Email:</label><p class="text-left about" >'+res[0].email+'</p>');

			if (res[0].phone!=null) {
        $(".contenido").append('<label class="col-lg-2 control-label about">Contacto:</label><p class="text-left about" >'+res[0].phone+'</p>');

      }
			$(".contenido").append('<div class="D_recomend " style="width:130px;height:30px"><iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.localhost%3A8000%2Fhome%2Fliked%2F'+res[0].email+'&width=105&layout=button_count&action=recommend&size=large&show_faces=true&share=false&height=21&appId=484448808559543" width="200" height="30" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>');

      // aca el boton de recomendar
	/*(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=484448808559543';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));*/


    }


 });
}


$(document).ready(function() {
  $("#description-nav2").on('click', function(event) {
    event.preventDefault();
		$(".D_recomend ").remove();
    description();

  });

    $("#comments-nav2").on('click',function(event) {
      event.preventDefault();
			$(".D_recomend ").remove();
      comments();
    });

    $("#about-nav2").on('click',function(event) {
      event.preventDefault();
			$(".D_recomend ").remove();
      about();
    });

});

function insert_question(){ //boton de preguntas ventana modal
if($("#id-user").length > 0){
  var idpublicacion=  $("#id").val();
  var idusuario=  $("#id-user").val();
  var question = $("#com").val();
  var token = $("#token").val();
  var route = "http://localhost:8000/home/";


  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN':token},
    type: 'POST',
    dataType: 'json',
    data: {idpublicacion: idpublicacion, idusuario:idusuario,question:question}
  })
  $("#com").val('');
  $(".contenedor").remove();
  comments();

}else{
  $.confirm({
    title: 'Error!',
content: 'Para comentar primero debes iniciar sesión',

    buttons: {

        Ok: {
            btnClass: 'btn-warning',

        },
    }
});
}



}



function Mostrar(btn){

$(".D_recomend ").remove();
   var route = "http://localhost:8000/image/"+btn+"";

   $(".item2").remove();
   $.get(route, function(res){

      $('#xdd').append(" <div class='item active item2'> <img   class='d-block img-fluid item2 it  ' src='images/"+res[0].images_route+ "' ></div>  ");

    for (var i = 1; i < res.length; i++) {
      $('#xdd').append("  <div class='item  item2' > <img   class='d-block img-fluid item2 it' src='images/"+res[i].images_route+ "' > </div>  ");

    }
    });
    var iduser = $("#id-user").val();
    var route2 = "http://localhost:8000/data_home/"+btn+"";
     $.get(route2, function(res){
       $("#id").val(res[0].id)
       $("#title").text(res[0].name);
       $("#precio").text("$"+formatNumber(res[0].price)+" CLP");
       $("#quantity").text("Cantidad: "+res[0].quantity);
       $("#region-sector").text(res[0].region_name+", "+res[0].sector_name);
       $(".descripcion").text(res[0].description);
       $('#description-nav2').trigger('click');//con esto al hacer click en otro modal siempre muestra la descripcion primero





    });

    var route3 = "http://localhost:8000/favoritos2/"+btn+"/"+iduser+"";
    $.get(route3, function(res){

  console.log(res.length);
  if (res.length > 0) {
    $('#btn-favorito').remove();
    $('.cont-fav').append('<button type="button" onclick="add_favorite()" id="btn-favorito" class="btn btn-articulo btn-lg btn-block"><span class="icon icon-heart" style="padding:20px;"></span>Agregado a favoritos!</button>');


		$('#btn-favorito').attr("disabled", true);

  }else{
    $('#btn-favorito').remove();
    $('.cont-fav').append('<button type="button" onclick="add_favorite()" id="btn-favorito" class="btn btn-articulo btn-lg btn-block"><span class="icon icon-heart" style="padding:20px;"></span>Agregar a favoritos</button>');

	  $('#btn-favorito').attr("disabled", false);

  }
	// $(".fb-like").attr("data-href","http://www.localhost:8000/home/"+btn+"");
	// $('.social-face').append('<br><br><div class="fb-like" data-href="http://www.localhost:8000/home/share/'+btn+'" data-layout="button_count" data-action="recommend" data-size="large" data-show-faces="true" data-share="true"></div>');


	$('.fce').remove();
	$('.content-fce').append('<div class="fce"></div>');
	/*(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=484448808559543';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));*/
http://www.localhost:8000/home/shared/3
	$('.fce').append('<iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fwww.localhost%3A8000%2Fhome%2Fshare%2F'+btn+'&layout=button_count&size=large&mobile_iframe=true&appId=484448808559543&width=110&height=28" width="110" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>');

console.log("este es el id de la pub"+btn);
	 });

}

// CATEGORIAS--------------------------------------------------------
function image_piano(){
  $('.destacados').empty();
  $('.destacados').html("Pianos y teclados");
  $('.thumb').remove();
  var route = "http://localhost:8000/image_piano";
  $.get(route, function(res){

  for (var i = 0; i < res.length; i++) {

     $('.makina').append('<div class="col-lg-3 col-md-4 col-xs-6 thumb " ><a class="thumbnail" href="#myModal" data-toggle="modal"  style="text-decoration:none" onclick="Mostrar('+res[i].publication_id+')"><img class="img-responsive" src="images/'+res[i].images_route+'" alt=""><p style="font-weight: bold;">'+res[i].name+'</p><p class="precio" >  $'+res[i].price+' CLP  </p></a> </div>')
  }

 });

}
function image_guitarra(){
  $('.destacados').empty();
  $('.destacados').html("Guitarras");
  $('.thumb').remove();
  var route = "http://localhost:8000/image_guitarra";
  $.get(route, function(res){

  for (var i = 0; i < res.length; i++) {

    $('.makina').append('<div class="col-lg-3 col-md-4 col-xs-6 thumb " ><a class="thumbnail" href="#myModal" data-toggle="modal"  style="text-decoration:none" onclick="Mostrar('+res[i].publication_id+')"><img class="img-responsive" src="images/'+res[i].images_route+'" alt=""><p style="font-weight: bold;">'+res[i].name+'</p><p class="precio" >  $'+res[i].price+' CLP  </p></a> </div>')
  }

 });

}
function image_bajo(){
  $('.destacados').empty();
  $('.destacados').html("Bajos");
  $('.thumb').remove();
  var route = "http://localhost:8000/image_bajo";
  $.get(route, function(res){

  for (var i = 0; i < res.length; i++) {

    $('.makina').append('<div class="col-lg-3 col-md-4 col-xs-6 thumb " ><a class="thumbnail" href="#myModal" data-toggle="modal"  style="text-decoration:none" onclick="Mostrar('+res[i].publication_id+')"><img class="img-responsive" src="images/'+res[i].images_route+'" alt=""><p style="font-weight: bold;">'+res[i].name+'</p><p class="precio" >  $'+res[i].price+' CLP  </p></a> </div>')
  }

 });

}
function image_bateria(){
  /*  $('#paginar1').empty();*/
 $("#paginar1").load("paginar1");
  $('.destacados').empty();
  $('.destacados').html("Baterías");
  $('.thumb').remove();
  var route = "http://localhost:8000/image_bateria";
  $.get(route, function(res){

  for (var i = 0; i < res.length; i++) {

    $('.makina').append('<div class="col-lg-3 col-md-4 col-xs-6 thumb " ><a class="thumbnail" href="#myModal" data-toggle="modal"  style="text-decoration:none" onclick="Mostrar('+res[i].publication_id+')"><img class="img-responsive" src="images/'+res[i].images_route+'" alt=""><p style="font-weight: bold;">'+res[i].name+'</p><p class="precio" >  $'+res[i].price+' CLP  </p></a> </div>')
  }

 });

}
function image_accesorios(){
  $('.destacados').empty();
  $('.destacados').html("Accesorios");
  $('.thumb').remove();
  var route = "http://localhost:8000/image_accesorios";
  $.get(route, function(res){

  for (var i = 0; i < res.length; i++) {

    $('.makina').append('<div class="col-lg-3 col-md-4 col-xs-6 thumb " ><a class="thumbnail" href="#myModal" data-toggle="modal"  style="text-decoration:none" onclick="Mostrar('+res[i].publication_id+')"><img class="img-responsive" src="images/'+res[i].images_route+'" alt=""><p style="font-weight: bold;">'+res[i].name+'</p><p class="precio" >  $'+res[i].price+' CLP  </p></a> </div>')
  }

 });

}

$(document).ready(function() {

  $("#resultado").autocomplete({

    source: function(request,response){
      $.ajax({
        url: "http://localhost:8000/search",
        type: 'GET',
        dataType: 'json',
        data: {q: request.term},
        success:function(data){
          response(data);
        },
        minLength:1,
      /*  select: function(event,ui){
          alert('selecciono:'+ui.term.label)
        }*/
      })
    }

  });

  $( "#resultado" ).on( "keyup", function( event ) {
/*    $( "#log" ).html( event.type + ": " +  event.which );

*/
  var resultado =$( "#resultado" ).val();

    if (event.which ==13 ) {

      $('#title-header').empty();

      $('.thumb').remove();
      var route = "http://localhost:8000/search_article/"+resultado+"";

      $.get(route, function(res){
			console.log(res);
			if (res.length > 0) {
					$('#title-header').append('<h3 class="page-header destacados">Resultados para "'+resultado+'"</h3>')
				for (var i = 0; i < res.length; i++) {

					$('.makina').append('<div class="col-lg-3 col-md-4 col-xs-6 thumb " ><a class="thumbnail" href="#myModal" data-toggle="modal"  style="text-decoration:none" onclick="Mostrar('+res[i].publication_id+')"><img class="img-responsive" src="images/'+res[i].images_route+'" alt=""><p style="font-weight: bold;">'+res[i].name+'</p><p class="precio" >  $'+formatNumber(res[i].price)+' CLP  </p></a> </div>')
				}

			} else {
				$('#title-header').empty();
				$('#title-header').append('<h3 class="page-header destacados">No se encontrarón resultados para "'+resultado+'"</h3>')
			}


     });

    }

  });

});


function add_favorite(){
  var iduser = $("#id-user").val();
  var idpub = $("#id").val();
  var token = $("#token").val();
  var route = "http://localhost:8000/favoritos/";

  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN':token},
    type: 'POST',
    dataType: 'json',
    data: {iduser: iduser,idpub:idpub}
  });

  $('#btn-favorito').remove();
  $('.cont-fav').append('<button type="button" onclick="add_favorite()" id="btn-favorito" class="btn btn-articulo btn-lg btn-block"><span class="icon icon-heart" style="padding:20px;"></span>Agregado a favoritos!</button>');
  $('#btn-favorito').attr("disabled", true);

}
























/*function Mostrar2(btn){


   var route = "http://localhost:8000/image/"+btn+"";

   $(".item2").remove();
   $.get(route, function(res){

      $('#xdd').append(" <div class='item active item2'> <img   class='d-block img-fluid item2 it  ' src='images/"+res[0].images_route+ "' ></div>  ");

    for (var i = 1; i < res.length; i++) {
      $('#xdd').append("  <div class='item  item2' > <img   class='d-block img-fluid item2 it' src='images/"+res[i].images_route+ "' > </div>  ");

    }

    });

    var route2 = "http://localhost:8000/data_home/"+btn+"";

     $.get(route2, function(res){
       $("#id").val(res[0].id)
       $("#title").text(res[0].name);
       $("#precio").text("$"+res[0].price+" CLP");
       $("#quantity").text("Cantidad: "+res[0].quantity);
       $("#region-sector").text(res[0].region_name+", "+res[0].sector_name);
       $(".descripcion").text(res[0].description);
       $('#description-nav2').trigger('click');//con esto al hacer click en otro modal siempre muestra la descripcion primero





    });

}
*/

function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}
