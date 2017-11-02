@extends ('principal.principal')

@section ('contenido')
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="table-responsive" >
      <table class="table table-striped table-bordered table-condensed table-hover">
      <tr>
      	
      	<div id="mapa" style="width:700px; height:500px">
      		--Aqui mapa--

      	</div>
            <input type="text" name="entrada_datos" id="mapsearch" size="50">
            <div id="mp" style="width:700px; height:500px">Hola</div>
      	<script type="text/javascript">
      		


      		//PARA EL MAPA
      		navigator.geolocation.getCurrentPosition(fn_ok,fn_error);

      		
      		//var divMApa =$('mapa')
      		function fn_error(){
      				divMapa.innerHTML = 'Hubo problema en la solicitud de los datos';
      		}

      		function fn_ok(respuesta){
                              
                              var divMapa = document.getElementById('mapa');
      				//mostrar_objeto(respuesta.coords);
      				//divMapa.innerHTML = 'Los permisos para acceso fueron dados';
      				var lon=respuesta.coords.longitude;
      				var lat=respuesta.coords.latitude;

      				var gLatLon = new google.maps.LatLng(lat,lon);
      				var objConfig = {
      					zoom:17,
      					center:gLatLon
      				}
      				var gmapa = new google.maps.Map(divMapa, objConfig);
      				var objConfigMarker ={
      					position:gLatLon,
      					map:gmapa,
      					animation: google.maps.Animation.DROP,//Animacion de caida al marker*/
      					draggable:true,//mover el marker
      					title:"posicion 1"
      				}
      				var gMarker = new google.maps.Marker(objConfigMarker);

      				//NUEVOOO!!
      				//Para crear un modal de informacion
      				var objHTML = {
      					content: '<div style="height: 15opx; width:300px"><h2>Mi posicion</h2><h3>Cambiar la imagen del marker , pendiente</h3><p>Informate <a href="https://www.youtube.com/watch?v=lRbRZxdONoA"/></p></div>'
      				}
      				var gIW = new google.maps.InfoWindow(objHTML);
      				//darle un evento onclick al marker
      				google.maps.event.addListener(gMarker, 'click' , function(){
      					gIW.open(gmapa, gMarker);
      				});
      				//CREAR UN PANORAMA AUTO(pendiente)

      				//PARTE OTRA UBICACION
      				var gCoder = new google.maps.Geocoder();
      				var objInformacion = {
      					address: '12 de Noviembre, Cercado de Lima , Peru'
      				}
      				gCoder.geocode(objInformacion, fn_coder);

      				function fn_coder(datos){
      					var coordenadas = datos[0].geometry.location;
      					var config  = {
      						map:gmapa,
      						position: coordenadas,
      						title: 'Escuela Davinci'
      					}
      					var gMarkerDV = new google.maps.Marker(config);
      					//gMarkerDV.setIcon('icon_edificio.png');
      				}
      				//SOLO COORD
      				//divMapa.innerHTML = lat+','+lon;
      				//MAPA ESTATIC
      				//var coordenadas=lat+','+lon;
      				
      				//divMapa.innerHTML='<img src="http://maps.googleapis.com/maps/api/staticmap?size=700x400&markers=color:blue|label:Y|'+coordenadas+'"/>';

                              //OTRO MAPA
                              var mapa2 = new google.maps.Map(document.getElementById('mp'),{
                                    center:{
                                          lat:27.72,
                                          lng:85.36

                                    },
                                    zoom:15
                              });
                              var marker2 = new google.maps.Marker({
                                    position:{
                                          lat:27.72,
                                          lng:85.36

                                    },
                                    map:mapa2,
                                    draggable:true
                              });


                              //PARA EL BUSCADOR
                              var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));
      				//PARA COLOCANDO DEL INPUT NOS APAREZCA EN EL MAPA
      				google.maps.event.addListener(searchBox,'places_changed',function(){
      				var places = searchBox.getPlaces();
      				var bounds = new google.maps.LatLngBounds();
      				var i ,place;
      				for (i = 0;place=places[i]; i++) {
      						bounds.extend(place.geometry.location);
      						marker2.setPosition(place.geometry.location);
      					}
      				mapa2.fitBounds(bounds);
      				mapa2.setZoom(15);
      		});
      		}

      		//mostrar_objeto(navigator.geolocation);

      		/*function mostrar_objeto(obj){
      				for (var prop in obj) {
      					document.write(prop+':'+obj[obj]+'<br>');
      				}
      		}*/
      	</script>
	  </tr>

	  </table>

  </div>
  </div>
</div>
<?php