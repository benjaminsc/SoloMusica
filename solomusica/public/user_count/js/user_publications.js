$(document).ready(function() {

  $("#publications").on('click', function(event) {
    document.getElementById("publication").innerHTML = "";
    event.preventDefault();
    $("#publication").load("user_publications");


  });

  $("#sale").on('click', function(event) {
    document.getElementById("publication").innerHTML = "";
    event.preventDefault();
    $("#publication").load("user_sales");


  });
	$("#resumen").on('click', function(event) {
    document.getElementById("publication").innerHTML = "";
    event.preventDefault();
    $("#publication").load("user_resumen");


  });

  $("#favorites").on('click', function(event) {
    document.getElementById("publication").innerHTML = "";
    event.preventDefault();
    $("#publication").load("show_favorites");
  });

});



function Delete(btn) {

  $.confirm({
    title: 'Cuidado!',
    content: '¿Desea eliminar su publicación?',
    buttons: {


      aceptar: function() {
        var route = "http://localhost:8000/micuenta/" + btn.value + "";
        var token = $("#token").val();

        $.ajax({
          url: route,
          headers: {
            'X-CSRF-Token': token
          },
          type: 'DELETE',
          dataType: 'json',

        });
        $("#contenedor").empty();
        $("#publication").load("user_publications");
        $.alert('Su publicación fue eliminada con exito!');

      },
      cancelar: {
        btnClass: 'btn-lead',
        cancelar: function() {
          $.alert('Eliminacion cancelada');
        },
      }
    }
  });

}

function UPdate_estado(id) {
  $.confirm({
    title: 'Cuidado!',
    content: '¿Desea eliminar su publicación?',
    buttons: {


      aceptar: function() {
        var route = "http://localhost:8000/UPdate_estado/" + id + "";
        var token = $("#token").val();
        // console.log(btn.value);

        $.ajax({
          url: route,
          headers: {
            'X-CSRF-Token': token
          },
          dataType: 'json',

        });
        $("#contenedor").empty();
        $("#publication").load("user_publications");
        $.alert('Su publicación fue eliminada con exito!');

      },
      cancelar: {
        btnClass: 'btn-lead',
        cancelar: function() {
          $.alert('Eliminacion cancelada');
        },
      }
    }
  });
}

function Mostrar(btn) {
  console.log(btn.value);
  var route = "http://localhost:8000/micuenta/" + btn.value + "/edit";
  $.get(route, function(res) {
    $('#title').val(res.name);
    $('#id').val(res.id);
    $('#category').val(res.category_id);
    $('#sector1').val(res.sector_id);
    $('#description').val(res.description);
    $('#quantity').val(res.quantity);
    $('#price').val(res.price);


  });

}

/*function xd(){
  $.get("images/" + btn.value+ "", function(response) {
          var obj = response[0].images_route;
return

  });
}*/

function Update(btn) {
  var id = $("#id").val();


  var title = $("#title").val();
  var category = $("#category").val();
  var price = $("#price").val();
  var quantity = $("#quantity").val();
  var sector = $("#sector").val();
  if (sector == null) { //validacion de sector-- no puede haber un sector nulo, ya que sector es foreign key
    sector = $("#sector1").val();
  }
  var description = $("#description").val();
  var route = "http://localhost:8000/micuenta/" + id + "";
  var token = $("#token").val();

  $.ajax({
    url: route,
    headers: {
      'X-CSRF-Token': token
    },
    type: 'PUT',
    dataType: 'json',
    data: {
      title: title,
      category: category,
      price: price,
      quantity: quantity,
      sector: sector,
      description: description
    },

    error: function() {
      $("#myModalEditar").modal('toggle');
    }
  });

}

function postPayment(btn) { //funcion para mostrar los datos antes del pago efectivo
  /*document.getElementById("imgPay").src="";*/
  console.log(btn.value);
  var route = "http://localhost:8000/micuenta/" + btn.value + "/edit";
  $.get(route,
    function(res) {

      $('#title').val(res.name);
      // $('#titulo').val(res.name);
      document.getElementById("titulo").innerHTML = res.name;
      console.log(res);
    });



  $.ajax({
    type: 'get',
    url: 'http://localhost:8000/khipu',
    data: {
      'id': btn.value
    },
    success: function(data) {
      console.log(data);

      $('#resultado').html(data);
			/*$('#khipu').append(data);*/


    },
    error: function() {

    }
  });

  $.ajax({
    type: 'get',
    url: 'http://localhost:8000/getImage',
    data: {
      'id_img': btn.value
    },
    success: function(data) {
      console.log(data);
      // $('#img').html(data);

      document.getElementById("imgPay").src = "images/" + data.images_route + "";
      // document.getElementById("imgPay").src="images/"+data.images_route;

    },
    error: function() {

    }
  });

}

function marcarVendido(id) {

  $.ajax({
    type: 'get',
    url: 'http://localhost:8000/user_mark_sold',
    data: {
      'id': id
    },
    success: function(data) {
      console.log(data);
      // $('#img').html(data);


      document.getElementById("publication").innerHTML = "";
      $("#publication").load("user_publications");

    },
    error: function() {
      console.log("error");
    }
  });

}
function marcarDisponible(id) {

  $.ajax({
    type: 'get',
    url: 'http://localhost:8000/user_mark_disponible',
    data: {
      'id': id
    },
    success: function(data) {
    /*  console.log(data);*/
      // $('#img').html(data);

			document.getElementById("publication").innerHTML = "";
			// event.preventDefault();
			$("#publication").load("user_sales");

      // document.getElementById("publication").innerHTML = "";
      // $("#publication").load("user_publications");

    },
    error: function() {
      console.log("error");
    }
  });

}

function Delete_favorites(id) {
$('#myModal').attr('id','');
  $.ajax({
    type: 'get',
    url: 'http://localhost:8000/Delete_favorites',
    data: {
      'id': id
    },
    success: function(data) {
  document.getElementById("publication").innerHTML = "";
      $("#publication").load("show_favorites");

    },
    error: function() {
      console.log("error");
    }
  });

}

function questions_all(id) {
	$( "#preguntas" ).empty();
  $.ajax({
    type: 'get',
    url: 'http://localhost:8000/questions_all',
    data: {
      'id': id
    },
    success: function(data) {
  // document.getElementById("publication").innerHTML = "";
      // $("#publication").load("show_favorites");

				for (comm of data) {

					var dateString=comm.date;
					var time;
					var newfecha;
					/*console.log(convertDateFormat(dateString));*/

					function convertDateFormat(string) {
					  var info = string.split(' ');
						time=info[1];
						var fecha=info[0];

						var Tfecha=fecha.split('-');
						newfecha=Tfecha[2] + '/' + Tfecha[1] + '/' + Tfecha[0];

						return newfecha+" "+time;
					}
					var fechatime=convertDateFormat(dateString);

					$('#preguntas').append('<div class="'+comm.id+' thumbnail b"><img class="imgPQ" src="images/'+comm.images_route+'" alt=""> '
					+'<label class="pt">'
					+comm.pname+' -</label> <label class="preg">'
					+comm.name+' Pregunta: </label> <label class="date">'
					+fechatime+'</label>  <h4 class="preg">'
					+comm.question+'</h4><input id="'+comm.id+'" type="text" required="true" onkeyup = "if(event.keyCode == 13 ) responder('+comm.id+',this.value)" class="form-control" type="text" name="" value="" placeholder="Responder"/><hr></div>')
					// $('#preguntas').append('<hr>')
				}
			console.log(data);

    },
    error: function() {
      console.log("error");
    }
  });

}
function responder(id,resp) {
	if (resp.length>0) {
		$('#'+id+'').css("border", "1px solid #f4f5f9");
		console.log(id,resp);

		$.ajax({
	    type: 'get',
	    url: 'http://localhost:8000/to_response',
	    data: {
	      'id': id,'resp':resp
	    },
	    success: function(data) {
			$( "."+id+"" ).remove();
/*
				if ($('#preguntas').is(':empty')) {
				console.log("nomas preguntas");

				}*/

	    },
	    error: function() {
	      console.log("error");
	    }
	  });

	}else {
		$('#'+id+'').css("border", "1px solid #e83030");
		$('#'+id+'').animate({opacity: '0.1'}, "slow");
		$('#'+id+'').animate({opacity: '1'}, "slow");
		$('#'+id+'').animate({opacity: '0.1'}, "slow");
		$('#'+id+'').animate({opacity: '1'}, "slow");
	}

}
function response_all(id) {
	$( "#respuestas" ).empty();
	$.ajax({
    type: 'get',
    url: 'http://localhost:8000/response_all',
    data: {
      'id': id
    },
    success: function(data) {
  // document.getElementById("publication").innerHTML = "";
      // $("#publication").load("show_favorites");
				for (comm of data) {
					var dateString=comm.updated_at;
					var time;
					var newfecha;
					/*console.log(convertDateFormat(dateString));*/

					function convertDateFormat(string) {
					  var info = string.split(' ');
						time=info[1];
						var fecha=info[0];

						var Tfecha=fecha.split('-');
						newfecha=Tfecha[2] + '/' + Tfecha[1] + '/' + Tfecha[0];

						return newfecha+" "+time;
					}
					var fechatime=convertDateFormat(dateString);
					$('#respuestas').append('<div class="contenedor_respuestas '+comm.id+' thumbnail"><div class="box"><div><p><img class="imgPQ" src="images/'+comm.images_route+'" alt=""> <label style="font-size:20px">'+comm.pname+'</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="date_c"> '+fechatime+'</label><img class="date" src="user_count/img/delete.png" alt="" title="Borrar comentario" onclick="delete_comment('+comm.id+')"></p></div><div class="pregunta"><p class="p">'+comm.question+'</p></div><div class="respuesta"><p class="r">'+comm.response+'</p></div></div></div>')

				}
			console.log(data);

    },
    error: function() {
      console.log("error");
    }
  });
}
function delete_comment(id) {
	$.ajax({
    type: 'get',
    url: 'http://localhost:8000/delete_comment',
    data: {
      'id': id
    },
    success: function(data) {
  // document.getElementById("publication").innerHTML = "";
      // $("#publication").load("show_favorites");
			$( "."+id+"" ).remove();
			console.log(data);

    },
    error: function() {
      console.log("error");
    }
  });
}

function updatesubir2(id) {
  $.confirm({
    title: 'Publicación premium!',
    content: '¿desea cambiar su publicación a estado Premium ahora?',
    buttons: {


      aceptar: function() {

        var route = "http://localhost:8000/updatesubir2/" + id.value + "";
        var token = $("#token").val();
        // console.log(btn.value);

        $.ajax({
          url: route,
          headers: {
            'X-CSRF-Token': token
          },
          dataType: 'json',

        });
        $("#publication").empty();
        $("#publication").load("user_publications");

        $.alert('Su publicación fue cambiada exitosamente!');



      },
      cancelar: {
        btnClass: 'btn-lead',
        cancelar: function() {
          $.alert('Cambio cancelado');
        },
      }
    }
  });
}

// ____________________________________benja


function description(){
	$(".D_recomend").remove();
  $(".comentario").remove();
  $(".contenedor").remove();
  $(".about").remove();
  $(".x2").removeClass('div_comm');


  var id =  $("#id").val();
  var route = "http://localhost:8000/data_nav2/"+id+"";
  $.get(route, function(res){
    if ( $(".descripcion").length > 0 ) {

    }else{
			if (res[0].description != null  ) {
				  $(".contenido").append('<p class="text-left descripcion" >'+res[0].description+'</p>');
			}

    }


 });
}
function comments(){
	$(".D_recomend").remove();
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
        $(".x2").append('<div class="contenedor "><div class="pre"><p class="pp">'+res[i].question+'</p></div><div class="res"><p class="rr">'+res[i].response+'</p></div></div>');

      }else {
        $(".x2").append('<div class="contenedor "><div class="pre"><p class="pp">'+res[i].question+'</p></div></div>');

      }
    }
  }

  });

}

function about(){
	$(".D_recomend").remove();
  $(".descripcion").remove();
  $(".comentario").remove();
  $(".contenedor").remove();
  $(".x2").removeClass('div_comm');



  var id =  $("#id").val();
  var route = "http://localhost:8000/about/"+id+"";
  $.get(route, function(res){
    console.log(res);
    if ( $(".about").length > 0 ) { //about-nav2 existe?

    }else{
			$(".D_recomend").remove();
      $(".x2").removeClass('div_comm');

      $(".contenido").append('<label class="col-lg-2 control-label about">Vendedor:</label><p class="text-left about" >'+res[0].name+" "+res[0].lastname+'</p>');
      $(".contenido").append('<label class="col-lg-2 control-label about">Email:</label><p class="text-left about" >'+res[0].email+'</p>');
      if (res[0].phone!=null) {
        $(".contenido").append('<label class="col-lg-2 control-label about">Contacto:</label><p class="text-left about" >'+res[0].phone+'</p>');


      }
			$(".contenido").append('<div class="D_recomend " style="width:130px;height:30px"><iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.localhost%3A8000%2Fhome%2Fliked%2F'+res[0].email+'&width=105&layout=button_count&action=recommend&size=large&show_faces=true&share=false&height=21&appId=484448808559543" width="200" height="30" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>');
    }


 });
}

function MostrarFavoritos(btn){


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
       // console.log(res[0].description);
       $("#id").val(res[0].id)
       $("#title").text(res[0].name);
       $("#precio").text("$"+formatNumber(res[0].price)+" CLP");
       $("#quantity").text("Cantidad: "+res[0].quantity);
       $("#region-sector").text(res[0].region_name+", "+res[0].sector_name);
			 $('.fce').remove();
			 $('.content-fce').append('<div class="fce"></div>');
			 $('.fce').append('<center><iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fwww.localhost%3A8000%2Fhome%2Fshare%2F'+res[0].id+'&layout=button_count&size=large&mobile_iframe=true&appId=484448808559543&width=110&height=28" width="110" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></center>');
       description();
       //con esto al hacer click en otro modal siempre muestra la descripcion primero





    });

}

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




function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}
