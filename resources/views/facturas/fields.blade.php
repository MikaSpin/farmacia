<?php 
if(isset($factura)){
     $fac_id=$factura->fac_id;
     $fac_nombre=$factura->fac_nombre;
     $fac_cedula=$factura->fac_cedula;
    //  $fac_no=$factura->fac_no;
     $fac_fecha=$factura->fac_fecha;
    //  $fac_descuento=$factura->fac_descuento;
    //  $fac_iva=$factura->fac_iva;
     $fac_total=$factura->fac_total;
     $fac_tipo_pago=$factura->fac_tipo_pago;
    //  $fac_observaciones=$factura->fac_observaciones;

}else{

     $fac_id="";
     $fac_nombre="";
     $fac_cedula="";
    //  $fac_no="";
     $fac_fecha=date('Y-m-d');
    //  $fac_descuento=0;
    //  $fac_iva=0;
     $fac_total=0;
     $fac_tipo_pago="EFECTIVO";
    //  $fac_observaciones="";
}
?>
<form action="{{route('facturas.store')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-3">
			<label for="cli_id">Cliente</label>
			<input type="text" name="fac_nombre" value="{{$fac_nombre}}" id="fac_nombre" class="form-control @error('fac_nombre') is-invalid @enderror"  value="{{ old('fac_nombre') }}" required autocomplete="fac_nombre">
                                                @error('fac_nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
		</div>
		<div class="col-md-3">
			<label for="cli_id">Cedula</label>
			<input type="text" name="fac_cedula" value="{{$fac_cedula}}" id="fac_cedula" class="form-control @error('fac_cedula') is-invalid @enderror"  value="{{ old('fac_cedula') }}" required autocomplete="fac_cedula">
                                                @error('fac_cedula')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
		</div>

		<div class="col-md-3">
			<label for="fac_fecha">Fecha</label>
			<input type="date" id="fac_fecha" value="{{$fac_fecha}}" required name="fac_fecha" class="form-control">
		</div>
	

	
		<div class="col-md-3">
            <label for="fac_fecha">Tipo Pago</label>
          <select name="fac_tipo_pago" id="fac_tipo_pago" class="form-control">
          	<option value="EFECTIVO">EFECTIVO</option>
          	<option value="TRANSFERENCIA">TRANSFERENCIA</option>
          	<option value="TARJETA">TARJETA</option>
        </select>
    </div>
    <div class="">
        <!-- <label for="fac_total">Total</label> -->
        <input type="hidden" id="fac_total" value="{{$fac_total}}" readonly name="fac_total" class="form-control">
    </div>
    <div class="col-md-3 " style="margin-top: 3.5%;">
        <!-- <label for="fac_total">Total</label> -->
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
		
	</div>
 
</form>

<form action="{{route('facturas.detalle')}}" method="POST" style="margin-top: 2%;">
	@csrf
	<table class="table">
		<tr>
			<th colspan="7" class="bg-primary text-white text-center">DETALLE DE LA FACTURA</th>
		</tr>
		<tr>
			<th>#</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Valor Unitario</th>
			<th>Valor Total</th>
			<th>Acciones</th>
		</tr>
		<tr>
			<td></td>
            <td>
                
                <select name="prod_id" id="prod_id" style="width:220px" class="form-control" >
                    <option value="">--Elija un producto--</option>
					                @foreach($productos as $prod)
									<option value="{{$prod->prod_id}}">{{$prod->prod_nombre}}</option>

				@endforeach
                
            
                </select>

            </td>
			<td>
				<input type="hidden" id="fac_id" name="fac_id" value="{{$fac_id}}" />
				<input type="number" min="1" name="fad_cantidad" id="fad_cantidad" class="form-control">

			</td>
			<td>
				<input type="number" step="0.001" id="fad_vu" readonly name="fad_vu" class="form-control">
			</td>
			<td>
				<input type="text" id="fad_vt" name="fad_vt" readonly class="form-control">
			</td>
			<td>
				<button class="btn btn-success" name="btn_detalle" value="btn_detalle" >+</button>
			</td>
		</tr>
	   @isset($detalle)
	   <?php 
	      $subt=0;
	   ?>
	         @foreach($detalle as $dt)
	         <?php $subt+=$dt->fad_vt;
	         ?>
	            <tr>
	            	<td>{{$loop->iteration}}</td>
	            	<td>{{$dt->prod_nombre}}</td>
	            	<td>{{$dt->fad_cantidad}}</td>
	            	<td class="text-right">{{number_format($dt->fad_vu,2)}}$</td>
	            	
	            	
	            	<td class="text-right">{{number_format($dt->fad_vt,2)}}$</td>
	            	<td>
	            		<button class="btn btn-danger btn-sm" name="btn_eliminar" value="{{$dt->fad_id}}" >Del</button>
	            	</td>
	            </tr>
	         @endforeach
	         <?php 
	            $vt=$subt;
	         ?>
	         <tr>
	         	    <td colspan="5" class="text-right">Subt:</td>
	         	    <td class="text-right">{{number_format($subt,2)}}$</td>
	         </tr>
	       
	        
	         <tr>
	         	    <td colspan="5" class="text-right">VT:</td>
	         	    <td class="text-right">{{number_format($vt,2)}}$</td>
	         </tr>
        @else
        <tr><th colspan="5" class="alert alert-warning">No existen datos</th></tr>
        @endisset

	</table>
    <a class="btn btn-dark" href="{{route('facturas.index')}}">Guardar factura</a>
</form>
<script>
window.onload = function(){
      const obj_cant=document.querySelector("#fad_cantidad");
      const obj_vu=document.querySelector("#fad_vu");
      obj_cant.addEventListener("change",()=>{
      	calculos();
      });
      obj_vu.addEventListener("change",()=>{
      	calculos();
      });

}

const calculos=()=>{
      	const vc=document.querySelector("#fad_cantidad");
      	const vu=document.querySelector("#fad_vu");
      	const vt=vc.value*vu.value;
      	document.querySelector("#fad_vt").value=vt;

}

</script>
