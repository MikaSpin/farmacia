<center><h1>Reporte De Inventario</h1></center>
<table border="1" class="table table-striped" >

	<th height="25" width="30" TD bgcolor="green">#</th>
	<th height="25" width="75" TD bgcolor="green">cantidad</th>
	<th height="25" width="75" TD bgcolor="green">Fecha</th>
    <th height="25" width="75" TD bgcolor="green">Nombre</th>
    <th height="25" width="75" TD bgcolor="green">Apellido</th> 
    <th height="25" width="75" TD bgcolor="green">Cedula</th>
    

    <tr>
    	<td>{{$loop->iteration}}</td>
        
    	<td>{{$productos->pro_id}}</td>
    	<td>{{$productos->bod_id}}</td>
        <td>{{$productos->prov_id}}</td>
        <td>{{$productos->ven_id}}</td>
        <td>{{$productos->inv_fecha}}</td>
        <td>{{$productos->inv_cantidad}}</td>
        <td>{{$productos->inv_precio}}</td>
        <td>
            


        </td>
    </tr>


    @endforeach
</table>