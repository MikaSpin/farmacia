@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
<div class="col-md-8">
	<div class="card" >
<div class="card-header bg-primary">

<div class="row">
	<div class="col-md-10">

		<h2 class=" text-white">Facturación</h2>
	</div>
	<div class="col-md-2">

	<a href="{{route('facturas.create')}}" class="btn btn-success">Nueva</a>

	</div>
</div>



</div>
<div class="card-body">

	<div class="container">
		<table class="table">
			<tr>
				
				<th>Factura Nro</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th>Cedula</th>
				<th>Acciones</th>
			</tr>
			@foreach($facturas as $f)
			<tr>
			
				<td>{{$f->fac_id}}</td>
				<td>{{$f->fac_fecha}}</td>
				<td>{{$f->fac_nombre}}</td>
				<td>{{$f->fac_cedula}}</td>
					@if($f->fac_estado==1)				
				<td>
					<a style="background:#46b6d0;" class="btn btn-primary" href="{{route('facturas.edit',$f->fac_id)}}">Editar</a>
					<a href="{{route('facturas.pdf',$f->fac_id)}}" class= "btn text-white "  style="background:#eb0009;">PDF</a>
				</td>
				<td>
								<a href="{{route('facturas.anular',$f->fac_id)}}" class="btn btn-sm" style="background-color:#FF7043"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
      <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
      </svg>  Anular</a>
    </td>

     @else
    <td>Anulado</td>
    <td>
      <a href="{{route('facturas.pdf',$f->fac_id)}}" class="btn btn-danger btn-sm">PDF</a>
    </td>
    @endif
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