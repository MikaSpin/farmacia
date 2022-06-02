@extends('layouts.app') 
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-7">

			<div class="card " > 
				<div class="card-header bg-primary">
					<div class="row">

						<div class="col-md-10">
							
							<h2 class=" text-white">Bodegas</h2>
						</div>
						<div class="col-md-2">
							
							<a href="{{route('bodegas.create')}}" class="btn btn-success">Nuevo</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					
					
					
					
					<table class="table table-striped " >
						<th>#</th>
					
						<th>Numero de la Bodega</th>
					
						<th>Acciones</th>
						@foreach($bodegas as $bod)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$bod->bod_nombre}}</td>
							<td>
					
					
								
					
					<div class="row">
					
						<a href="{{route('bodegas.edit',$bod->bod_id)}}"style="background:#46b6d0;" class="btn btn-primary">
						Editar
						</a>
					<!-- 	<form action="{{route('bodegas.destroy',$bod->bod_id)}}" method="POST" 
							onsubmit="return confirm('Desea eliminar?')" >
							@csrf
							<button class= "btn text-white "  style="background:#eb0009;" >
					Eliminar
							</button>
						</form>			
					 -->
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