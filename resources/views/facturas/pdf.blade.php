<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<div class="row">
	<div class="col-md-8">
		<div class="col-md-8"><img src="https://www.nicepng.com/png/full/204-2049937_logo-de-farmacia-png.png" width="50">FACTURA FARMACIA</div>
		<h3 style="font-size:10pt; margin-left: 5s% ;">Factura No:{{$factura->fac_id}}</h3>
		<h3 style="font-size:10pt; margin-left: 5s% ;">Cliente:{{$factura->fac_nombre}}</h3>
		<h3 style="font-size:10pt; margin-left: 5s% ;">Ruc:{{$factura->fac_cedula}}</h3>
		<h3 style="font-size:10pt; margin-left: 5s% ;">Direccion:Quito</h3>
		<h3 style="font-size:10pt; margin-left: 5s% ;">Direccion:Quito</h3>
		@if($factura->fac_estado==2)
		<h3 style="font-size:10pt; margin-left: 5s% ;">Estado:Anulado</h3>

		@else
		<h3 style="font-size:10pt; margin-left: 5s% ;">Estado:activo</h3>

		@endif
		<hr style="background-color: black;">
		<table style="width:85%"  class="table table-striped table-bordered">
			<tr>
				<th>#</th>
				<th style="text-align: left;">Producto</th>
				<th style="text-align: left;">Codigo</th>
				<th style="text-align: left;">Cantidad</th>
				<th style="text-align: left;">Valor Unitario</th>
				<th style="text-align: left;">Valor Total</th>
				
			</tr>
			<?php 
			$subt=0;
			?>
			@foreach($detalle as $d)
			<?php $subt+=$d->fad_vt;?>

			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$d->prod_nombre}}</td>
				<td>{{$d->prod_codigo}}</td>
				<td>{{$d->fad_cantidad}}</td>
				
				<td class="text-right">{{number_format($d->fad_vu,2)}}$</td>
				<td class="text-right">{{number_format($d->fad_vt,2)}}$</td>
			</tr>
			@endforeach	
			<?php 
			$vt=$subt;
			?>
			<tr>
				<td colspan="6s" style="text-align:right;">Subt:{{$vt}}</td>
			</tr>
			
			
			<tr>
				<td colspan="6s" style="text-align:right;">Total:{{$vt}}</td>
			</tr>
		</table>
		

	</div>
</div>