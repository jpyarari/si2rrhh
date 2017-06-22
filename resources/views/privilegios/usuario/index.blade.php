@extends ('layouts.admin')
@section ('contenido')
<div class="row"> 
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Usuarios <a href="usuario/create"><button>Nuevo</button></a></h3>
		@include('privilegios.usuario.search')
	</div>
</div>	

<div class="row"> 
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Clave</th>
					<th>Opciones</th>
				</thead>
				@foreach($usuario as $cat)
				<tr>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->clave}}</td>
					<td>
						<a href=""><button class="btn btn-info">Editar</button></a>
						<a href=""><button class="btn btn-danger">Eliminar</button></a>
					</td>

				</tr>
				@endforeach
			</table>
		</div>
		{{$usuario->render()}}
	</div>
</div>	

@endsection