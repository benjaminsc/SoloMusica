$( document ).ready(function() {

$('#userprofile_id').attr('disabled', true);
  $('.1, .2, .3, .4, .5').on('keyup', function() {
        var uno=  $('.1').val();
        var dos=  $('.2').val();
        var tres=  $('.3').val();
        var cuatro=  $('.4').val();
        var cinco=  $('.5').val();

        if (uno!="" && dos!=""&& tres!=""&& cuatro!=""&& cinco!="") {
           $('#userprofile_id').attr('disabled', false);
        }else {
           $('#userprofile_id').attr('disabled', true);
        }


      });

});


function postRegister() {
$(".input-texto").prop('disabled', true);
if ($('#userprofile_id').prop('checked')) {


  $( "#btnRegistro" ).empty(); //limpiamos el div "btnRegistro"
    $( "#home" ).remove(); //limpiamos el div "btnRegistro"
      $('#informacion').append("<br><ul><li>Registrate como Micro-Empresa y obtén 12 publicaciones Premium</li></ul>");
  $('#btnPagos').append('<div class="col-sm-6" id="resultado"></div>');

  var name=  $("#name").val();
  var lastname=  $("#lastname").val();
    var email=  $("#email").val();
      var phone=  $("#phone").val();
        var password=  $("#password").val();



  $.ajax({
    type: 'get',
    url: 'http://localhost:8000/khipu2',
    data: {name: name, lastname:lastname, email:email, phone:phone, password:password},

    success: function(data) {

      $('#resultado').html(data);

    }
  });

    $('#btnPagos').append('<div class="col-sm-6" ><a href="http://localhost:8000/payment2" onclick="paymentPaypal();"><img src="https://www.paypalobjects.com/webstatic/es_MX/mktg/logos-buttons/redesign/btn_13.png" alt="PayPal Checkout" id="img-paypal"></a></div>');
    $('#btn-home').append('<a id="home" href="http://localhost:8000/home" style="text-decoration:none;font-size:20px;float:right;margin-bottom:2px;margin-right:20px;"><span class="form-group "><i class="glyphicon glyphicon-home"></i></span> Volver a home</a>');

}

else{
  $(".input-texto").prop('disabled', false);
    $('#informacion').empty();
    $( "#btnPagos" ).empty();
    $('#btn-home').empty();
      $('#btnRegistro').append(' <a id="home" href="http://localhost:8000/home" style="text-decoration:none;font-size:20px;float:right;margin-bottom:2px;"><span class="form-group "><i class="glyphicon glyphicon-home"></i></span> Volver a home</a>');
    $('#btnRegistro').append(' <input type="submit" class="btn btn-default" value="Registrarme!">');

}


  /*if( $('#userprofile_id').prop('checked') ) {
      $( "#btnRegistro" ).empty();
      Mostrar botones de pago
      $('#btnPagos').append('<div class=""><div class="" id="khipu"><div class="" id="resultado"></div></div></div><a  href="http://localhost:8000/payment2" ><button type="button" class="btn btn-default" ><img src="https://www.paypalobjects.com/webstatic/es_MX/mktg/logos-buttons/redesign/btn_13.png" alt="PayPal Checkout"></button></a>');

      $.ajax({
        type: 'get',
        url: 'http://localhost:8000/khipu2',

        success: function(data) {


          $('#resultado').html(data);



        },
        error: function() {

        }
      });



  }else {
    $( "#btnPagos" ).empty();
    $('#btnRegistro').append(' <input type="submit" class="btn btn-default" value="Registrarme!">');

  }
*/



}

function paymentPaypal(){
  var name=  $("#name").val();
  var lastname=  $("#lastname").val();
    var email=  $("#email").val();
      var phone=  $("#phone").val();
        var password=  $("#password").val();

       $.ajax({
          type: 'get',
          url: 'http://localhost:8000/sesionData',
          dataType: 'json',
          data: {name: name, lastname:lastname, email:email, phone:phone, password:password},

					    success: function(data) {

					      console.log(data);

					    }
        });

}
