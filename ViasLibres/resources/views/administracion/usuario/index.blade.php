@extends ('principal.principal')

@section ('contenido')

	
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Usuarios&nbsp;&nbsp;</h3>
			<hr/>
			<div class="table-responsive" >
			<table class="table table-striped table-bordered table-condensed table-hover">
			<tr>
			<td>
			@include('administracion.usuario.buscar')
			</td>
			<td>
				<strong>| Registrar nuevo usuario : <a href="usuario/create"><button type="submit" class="btn btn-primary"<span class="glyphicon glyphicon-plus"></span>Registrar</button></a></strong>
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
					<th>Nombres</th>
					<th>Email</th>
					<th>Tipo</th>
					<th>Imagen</th>
					<th>Opciones</th>
				</thead>
				@foreach ($usuarios as $usu)
				<tr>
				    <td>{{$usu ->id}}</td>
					<td>{{$usu ->name}}</td>
					<td>{{$usu ->email}}</td>
					<td>{{$usu ->tipo}}</td>
					<td>
						<img src="{{asset('imagenes/personas/'.$usu->imagen)}}" alt="{{ $usu->name}}" height="100px" width="100px" class="img-thumbnail" >
					</td>
					<td>
						<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.usuario.modal')
				@endforeach
				</table>
			</div>
			{{ $usuarios->render() }}
		</div>
	</div>
@stop