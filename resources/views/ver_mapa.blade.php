@extends ('principal.principal')

@section ('contenido')

<?php
      $find=null;
      $latitude=null;
      $longitude=null;
      $fomatted_address=null;

      if (isset($GET['find'])) {

            //parametros de configuracion
            $api_key = "AIzaSyCDOJbWiQOjRgzjSIi_ZQJ7U7zMG8ahPck";
            $find =urlencode(trim($_GET['find']));

            //Api Web seervice de gogoglemaps
            $google_maps_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$find."&key=".$api_key;
            $google_maps_json= file_get_contents($google_maps_url);
            $google_maps_array= json_decode($google_maps_json,true);

            //Retornamos la locacion //latitud y longitud ingresadas
            $latitude = ($google_maps_array["results"][0]["geometry"]['location']['lat']);
            $longitude = ($google_maps_array["results"][0]["geometry"]['location']['lng']);
            $formatted_address = ($google_maps_array["results"][0]["formatted_address"]);
      }
?>
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="table-responsive" >
      
      	
      	
            
            <!--REcibir latitud y longitud-->
            <!--<br>
            <center>Ingrese un incidente : <input type="text" name="entrada_datos" id="mapsearch" size="50"></center>
            <hr>
            <center><div id="mp" style="width:700px; height:500px">Cargando mapa ... </div></center>
            -->

            <br>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <table class="table table-bordered" >
                  <center>Ingrese un incidente : <input type="text" name="entrada_datos" id="mapsearch" size="50"></center>
                  <div class="form-group">
                  <h2>Selecccione opcion : </h2>
                  <select class="form-control">
                  <option id="op1">Alerta</option>
                  <option id="op2">Medio</option>
                  <option id="op3">Leve</option>
                  </select>
                  </div>

                  <div class="btn-group" role="group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Seleccione una opción
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Alerta</a></li>
                    <li><a href="#">Medio</a></li>
                    <li><a href="#">Leve</a></li>
                  </ul>
                  </div>
                  <div>
                        <thead>
                        <th>Id</th>
                        <th>Latidtud</th>
                        <th>Longitud</th>
                        <th>Opcion</th>
                        </thead>
                        @foreach ($incidentes as $inc)
                        <tr>
                        <td>{{$inc ->id}}</td>
                        <td>{{$inc ->long_location}}</td>
                        <td>{{$inc ->lat_location}}</td>
                        <td>
                              <a href="#" ><button class="btn btn-danger">Ver mapa</button></a>
                        </td>
                        </tr>
                        @endforeach
                  </div>
            </table>
            {{ $incidentes->render() }}
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <center><div id="mp" style="width:700px; height:500px">Cargando mapa ... </div></center>
            </div>


      	<script type="text/javascript">
      		


      		//PARA EL MAPA
      		navigator.geolocation.getCurrentPosition(fn_ok,fn_error);

      		
      		//var divMApa =$('mapa')
      		function fn_error(){
      				divMapa.innerHTML = 'Hubo problema en la solicitud de los datos';
      		}

      		function fn_ok(respuesta){
                              
                              
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
	  

  </div>
  </div>
</div>
@stop