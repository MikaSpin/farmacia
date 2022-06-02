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

		<h2 class=" text-white">Lista de productos</h2>
	</div>
	<div class="col-md-2">

		<a href="{{route('productos.create')}}" class="btn btn-success">Nuevo</a>
	</div>
</div>
	</div>
	<div class="card-body">

		<table class="table table-striped">
			<th>#</th>
			<th>Nombre del producto</th>
			<th>Precio</th>
			<th>Codigo</th>
			<th>acciones</th>
			@foreach($productos as $prod)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$prod->prod_nombre}}</td>
				<td>${{$prod->prod_precio}}</td>
				<td>{{$prod->prod_codigo}}</td>
		
				<td>
		
		
					
		
				<div class="row">
		
					<a href="{{route('productos.edit',$prod->prod_id)}}" style="background:#46b6d0;" class="btn btn-primary">
					editar
					</a>
					<form action="{{route('productos.destroy',$prod->prod_id)}}" method="POST" 
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