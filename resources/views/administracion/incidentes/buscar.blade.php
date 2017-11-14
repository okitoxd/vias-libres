{!! Form::open(array('url'=>'administracion/incidentes','method'=>'GET','autocomplete'=>'off','rol'=>'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</span>
		</div>
	</div>
{{ Form::close() }}