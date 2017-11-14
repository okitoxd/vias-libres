@extends ('principal.principal')

@section ('contenido')

	
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Incidentes archivados&nbsp;&nbsp;</h3>
			<hr/>
			<div class="table-responsive" >
			<table class="table table-striped table-bordered table-condensed table-hover">
			<tr>
			<td>
			@include('administracion.archivados.buscar')
			</td>
			</tr>
			</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive" >
				<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripcion</th>
					<th>Estado de incidente</th>
					<th>Id de usuario</th>
					<th>Calificacion A</th>
					<th>Calificacion B</th>
					<th>Calificacion C</th>
					<th>Longitud</th>
					<th>Latitud</th>
					<th>Opciones</th>
				</thead>
				@foreach ($incidentes as $inc)
				<tr>
					<td>{{$inc ->id}}</td>
				    <td>{{$inc ->description}}</td>
				    <td>{{$inc ->name}}</td>
					<td>{{$inc ->user_id}}</td>
					<td>{{$inc ->calificationA}}</td>
					<td>{{$inc ->calificationB}}</td>
					<td>{{$inc ->calificationC}}</td>
					<td>{{$inc ->long_location}}</td>
					<td>{{$inc ->lat_location}}</td>

					<td>
						<a href="" data-target="#modal-delete-{{$inc->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.archivados.modal')
				@endforeach
				</table>
			</div>
			{{ $incidentes->render() }}
		</div>
	</div>
@stop