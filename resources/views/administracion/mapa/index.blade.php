@extends ('principal.principal')

@section ('contenido')

  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="table-responsive" >
            <br>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <table class="table table-bordered table-condensed table-striped" style="background-color: white;" >
                  <strong>BUSCAR INCIDENTES </strong>
                  <br>
                  <br>
                  BUSCAR POR LUGAR <br><br><input type="text" name="entrada_datos" id="mapsearch" size="50">
                  <br>
                  <br>
                  BUSCAR POR INCIDENTE<br><br>
                  
                  <!--<p id="total"></p>
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
                  </div>-->
                  <div>
                        <thead class="info">
                        <th>Id</th>
                        <th>Longitud</th>
                        <th>Latitud</th>
                        <th>Opcion</th>
                        </thead>
                        @foreach ($incidentes as $inc)
                        <tr class="info">
                        <td>{{$inc ->id}}</td>
                        <td>{{$inc ->long_location}}</td>
                        <td>{{$inc ->lat_location}}</td>
                        <td>
                              <button class="btn btn-success" onclick="myfunction({{$inc ->long_location}},{{$inc ->lat_location}},{{$inc ->id}});">Ver mapa</button>
                        </td>
                        </tr>
                        @endforeach
                  </div>
            </table>
            {{ $incidentes->render() }}
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <center><div id="mp" style="width:600px; height:500px"><img src="../imagenes/extras/mapa_peru.jpg" width="600px" height="500px"></div></center>
            </div>


            <script type="text/javascript">

                  function myfunction(long,lati,id){
                        var mapa2 = new google.maps.Map(document.getElementById('mp'),{
                                    center:{
                                          lat:lati,
                                          lng:long

                                    },
                                    zoom:15
                              });

                              var marker2 = new google.maps.Marker({
                                    position:{
                                          lat:lati,
                                          lng:long

                                    },
                                    animation: google.maps.Animation.DROP,
                                    map:mapa2,
                                    draggable:true,
                                    title:"posicion incidente"
                              });

                              
                              //NUEVOOO!!
                              //Para crear un modal de informacion
                              @foreach ($incidentes as $inc)
                              if ({{ $inc->id }} == id) {

                              var objHTML = {
                                    content: '<div style="height: 15opx; width:300px"><h4>Incidente Nro'+id+'</h4><p>Informate del incidente : <button id="btn1"><a href="{{URL::action('MapaController@show',$inc->id )}}" >Detalle</a></button></p></div>'
                              }
                              var gIW = new google.maps.InfoWindow(objHTML);
                              //darle un evento onclick al marker
                              google.maps.event.addListener(marker2, 'click' , function(){
                                    gIW.open(mapa2, marker2);
                              });

                              }
                              @endforeach

                  }
/*
                  //PARA EL MAPA
                  navigator.geolocation.getCurrentPosition(fn_ok,fn_error);

                  
                  //var divMApa =$('mapa')
                  function fn_error(){
                              divMapa.innerHTML = 'Hubo problema en la solicitud de los datos';
                  }
                  */
                  
                              
                              
                              //SOLO COORD
                              //divMapa.innerHTML = lat+','+lon;
                              //MAPA ESTATIC
                              //var coordenadas=lat+','+lon;
                              
                              //divMapa.innerHTML='<img src="http://maps.googleapis.com/maps/api/staticmap?size=700x400&markers=color:blue|label:Y|'+coordenadas+'"/>';

                              //OTRO MAPA
                              var mapa = new google.maps.Map(document.getElementById('mp'),{
                                    center:{
                                          lat:-12.0562041,
                                          lng:-77.0868589

                                    },
                                    zoom:15
                              });
                              var marker = new google.maps.Marker({
                                    position:{
                                          lat:-12.0562041,
                                          lng:-77.0868589

                                    },
                                    map:mapa,
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
                                          marker.setPosition(place.geometry.location);
                                    }
                              mapa.fitBounds(bounds);
                              mapa.setZoom(15);
                  });
                  

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