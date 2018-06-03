<div class="tesis">
<h3 style="font-weight: bold;text-align: center;">Estado de tus publicaciones</h3><br><br>
<div class="cont_g col-sm-9 col-md-9" ><h3 class="l">Premium</h3><div id="r1" class="graficos"></div></div>
<div class="cont_g col-sm-9 col-md-9" ></div>
<div class="cont_g col-sm-9 col-md-9"><h3 class="ri">Gratis</h3><div id="r2" class="graficos"></div></div>
</div>
<style media="screen">

.cont_g{
	width: 270px;
	height: 270px;
	/*margin: auto;*/
	/*align-content: center;*/
}
.l{
text-align: center;
font-weight: bold;

}
.ri{
text-align: center;
font-weight: bold;
}
#graficos{
width: 270px;
height: 270px;
margin: 20px auto 0 auto;
display: block;
}
</style>

 <script type="text/javascript">

 $(document).ready(function() {
 if ({{$pre_activas+$pre_vendidas  }} > 0) {
	 Morris.Donut({
	  element: 'r1',
	  data: [

		 @if ($pre_vendidas==0)
				{value: {{ $pre_activas }}, label: 'Activas'},
		 @elseif ($pre_activas==0)
				 {value: {{ $pre_vendidas }}, label: 'Vendidas'},
		 @else
				{value: {{ $pre_activas }}, label: 'Activas'},
				{value: {{ $pre_vendidas }}, label: 'Vendidas'},
		 @endif


	  ],
	  backgroundColor: '#ccc',
	  labelColor: '#060',
	  colors: [
			'#0BA462',
 		 '#39B580'
	  ],
	  formatter: function (x) { return x + "%"}
	 });
 }else {
 		$('#r1').append('<h4>No cuenta con publicaciones premium</h4>');
 }


	 if ({{$gra_activas+$gra_vendidas  }} > 0) {
		 Morris.Donut({
			element: 'r2',
			data: [
				@if ($gra_vendidas==0)
				   {value: {{ $gra_activas }}, label: 'Activas'},
				@elseif ($gra_activas==0)
				    {value: {{ $gra_vendidas }}, label: 'Vendidas'},
				@else
				   {value: {{ $gra_activas }}, label: 'Activas'},
					 {value: {{ $gra_vendidas }}, label: 'Vendidas'},
				@endif
			],
			backgroundColor: '#ccc',
			labelColor: '#060',
			colors: [
				'#0BA462',
				'#39B580'
			],
			formatter: function (x) { return x + "%"}
		 });
	 }else {
	 	$('#r2').append('<h4>No cuenta con publicaciones gratis</h4>');
	 }



 });
 </script>
