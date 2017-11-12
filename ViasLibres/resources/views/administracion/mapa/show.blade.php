@extends ('principal.principal')
@section ('contenido')

<h1>Incidente # {{$incidentes->id}}</h1>
<div class="row">
 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
 	<div class="form-group">
 		<label for="proveedor">Descripcion</label>
 		<p>{{$incidentes->description}}</p>
 	</div>
 </div>
 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
 	<div class="form-group">
 		<label>Estado de incidente</label>
 		<p>{{$incidentes->incident_status}}</p>
 	</div>
 </div>
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
 	<div class="form-group">
 		<label for="serie_comprobante">Id de usuario</label>
 		<p>{{$incidentes->user_id}}</p>
 	</div>
 </div>
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
 	<div class="form-group">
 		<label>Calificacion A</label>
 		<p>{{$incidentes->calificationA}}</p>
 	</div>
 </div>
 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
 	<div class="form-group">
 		<label>Calificacion B</label>
 		<p>{{$incidentes->calificationB}}</p>
 	</div>
 </div>
 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
 	<div class="form-group">
 		<label>Calificacion C</label>
 		<p>{{$incidentes->calificationC}}</p>
 	</div>
 </div>
 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
 	<div class="form-group">
 		<label>Longitud</label>
 		<p>{{$incidentes->long_location}}</p>
 	</div>
 </div>
 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
 	<div class="form-group">
 		<label>Latitud</label>
 		<p>{{$incidentes->lat_location}}</p>
 	</div>
 </div>
 </div>
 

 <div class="row">
 	<div class="panel panel-primary">
 		<div class="panel-body">
 			
 			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
 				<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
 					<thead style="background-color:#A9D0F5">
 						<th>Id</th>
 						<th>Descripcion</th>
 						<th>Estado incidente</th>
 						<th>Usuario ID</th>
 						<th>Calificacion A</th>
 						<th>Calificacion B</th>
 						<th>Calificacion C</th>
 						<th>Longitud</th>
 						<th>Latitud</th>
 						<th>Foto</th>
 					</thead>
 					
 					<tbody>
 						@foreach($detalles as $det)
 						<tr>
 							<td>{{$det->id}}</td>
 							<td>{{$det->description}}</td>
 							<td>{{$det->name}}</td>
 							<td>{{$det->user_id}}</td>
 							<td>{{$det->calificationA}}</td>
 							<td>{{$det->calificationB}}</td>
 							<td>{{$det->calificationC}}</td>
 							<td>{{$det->long_location}}</td>
 							<td>{{$det->lat_location}}</td>
 							<td>
 								<img src="{{asset('../imagenes/extras/'.$det->imagen)}}" alt="{{ $det->imagen}}" height="100px" width="100px" class="img-thumbnail" >

 							</td>
 						</tr>
 						@endforeach
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>

 </div>

 @endsection