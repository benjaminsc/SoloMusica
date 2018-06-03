<style media="screen">

.contenedor-slider {
margin: auto;
width: 85%;
max-width: 900px;
position: relative;
overflow: hidden;
box-shadow: 0 0 0 10px #fff,
0 15px 50px;
}

.slider {
display: flex;
width: 400%;
}

.slider__section {
width: 100%;
}

.slider__img {
display: block;
width: 100%;
height: 100%;
}

.btn-prev, .btn-next {
width: 40px;
height: 40px;
background: rgba(255, 255, 255, 0.7);
position: absolute;
top: 50%;
transform: translateY(-50%);
line-height: 40px;
font-size: 30px;
font-weight: bold;
text-align: center;
border-radius: 50%;
font-family: monospace;
cursor: pointer;
}

.btn-prev:hover, .btn-next:hover {
background: white;
}

.btn-prev {
left: 10px;
}

.btn-next {
right: 10px;
}
</style>
<div id="contenedor-slider" class="contenedor-slider">
 <div id="slider" class="slider">

  </div>
  <div id="btn-prev" class="btn-prev">&#60;</div>
  <div id="btn-next" class="btn-next">&#62;</div>
 </div>


 <script type="text/javascript">
 //almacenar slider en una variable
var slider = $('#slider');
//almacenar botones
var siguiente = $('#btn-next');
var anterior = $('#btn-prev');

//mover ultima imagen al primer lugar
$('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
//mostrar la primera imagen con un margen de -100%
slider.css('margin-left', '-'+100+'%');

function moverD() {
slider.animate({
  marginLeft:'-'+200+'%'
} ,700, function(){
  $('#slider .slider__section:first').insertAfter('#slider .slider__section:last');
  slider.css('margin-left', '-'+100+'%');
});
}

function moverI() {
slider.animate({
  marginLeft:0
} ,700, function(){
  $('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
  slider.css('margin-left', '-'+100+'%');
});
}

function autoplay() {
interval = setInterval(function(){
  moverD();
}, 5000);
}
siguiente.on('click',function() {
moverD();
clearInterval(interval);
autoplay();
});

anterior.on('click',function() {
moverI();
clearInterval(interval);
autoplay();
});


autoplay();


function Mostrar(btn){

   var route = "http://localhost:8000/image/"+btn+"";


   $.get(route, function(res){


      $('#slider').append("  <section class='slider__section' > <img  class='slider__img' src='images/"+res[0].images_route+ "' > </section>  ");


    });

    var route2 = "http://localhost:8000/data_home/"+btn+"";

     $.get(route2, function(res){
       $("#title").text(res.name);
       $("#precio").text("$"+res.price+" CLP");

    });

}
 </script>
