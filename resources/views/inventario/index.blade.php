@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
<div class="col-md-9">
	<div class="card" >
		<div class="card-header bg-primary" >
<div class="row">
	<div class="col-md-5">
		
		<h2 class="text-white">Lista de Inventario</h2>
	</div>
	<div class="col-md-5">

		<form action="{{route('inventario.search')}}" method="post">
			@csrf
			<div class="row">
		
		<input name="prod_nombre" class="form-control" style="width:60% ;" id="validationCustom04" required>
			
		
		<div class="invalid-feedback">
			Please select a valid state.
		</div>
		
		<button type="submit" value="btn_buscar" class="btn btn-dark " style="border:solid #000 1px; background:;"> Buscar</button>
		</div>
		</form>
	</div>
	<div class="col-md-2">

		<a href="{{route('inventario.create')}}" class="btn btn-success">Nuevo</a>
	</div>
</div>
		</div>
		<div class="card-body">
			
			<table class="table table-striped " >
				<th>#</th>
			
				<th>Nombre del producto</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Provedor</th>
				<th>Bodega</th>
				<th>Acciones</th>
			
			
				@foreach($inventario as $inv)
				<tr>
					<td>{{$loop->iteration}}</td>
					
					<td>{{$inv->prod_nombre}}</td>
					<td>{{$inv->prod_precio}}</td>
					<td>{{$inv->inv_cantidad}}</td>
					<td>{{$inv->prov_nombre}}</td>
					<td>{{$inv->bod_nombre}}</td>
					<td>
			
			
						
			
			<div class="row">
			
				<a href="{{route('inventario.edit',$inv->inv_id)}}" style="background:#46b6d0;" class="btn btn-primary">
					Editar
				</a>
				<form action="{{route('inventario.destroy',$inv->inv_id)}}" method="POST" 
					onsubmit="return confirm('Desea eliminar?')" >
					@csrf
					<button class= "btn text-white "  style="background:#eb0009;" >
			Eliminar
</button>
				</form>			
			
				</div>
			
			
			</td>
				</tr>
				@endforeach
			</table>

		</div>
	</div>
</div>
	</div>

	</div>
</div>
@endsection  