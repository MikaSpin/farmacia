@extends('layouts.app')
@section('content')
<div class="container">
	 <div class="row justify-content-center">
	 	<div class="col-md-8">
	 		@isset($msg)
	 <div class="bg-danger"><strong>{{$msg}}</strong></div>
	 @endisset		
	 		<div class="card" >
	<div class="card-header bg-primary">
<div class="row">
	<div class="col-md-10">

		<h2 class=" text-white">Lista de Provedores</h2>
	</div>
	<div class="col-md-2">

		<a href="{{route('provedor.create')}}" class="btn btn-success">Nuevo</a>
	</div>
</div>
	</div>
	<div class="card-body">

		<table class="table table-striped">
			<th>#</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>telefono</th>
			<th>acciones</th>
			@foreach($provedor as $prov)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$prov->prov_nombre}}</td>
				<td>{{$prov->prov_direccion}}</td>
				<td>{{$prov->prov_telefono}}</td>
		
				<td>
		
		
					
		
				<div class="row">
		
					<a href="{{route('provedor.edit',$prov->prov_id)}}" style="background:#46b6d0;" class="btn btn-primary">
						Editar
					</a>
					<form action="{{route('provedor.destroy',$prov->prov_id)}}" method="POST" 
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

@endsection