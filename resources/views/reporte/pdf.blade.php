<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">      
<div class="row">
    <div class="col-md-8">
        <div class="col-md-8"><img src="https://www.nicepng.com/png/full/204-2049937_logo-de-farmacia-png.png" width="50">REPORTE DE PRODUCTOS DE FARMACIA</div>
        <hr style="background-color: black;">

        <table class="table table-striped table-bordered">
            <th  style="text-align:center;font-family: algeria;">Producto</th>
            <th  style="text-align:center;font-family: algeria;">Codigo</th>
            <th  style="text-align:center;font-family: algeria;">Stock</th>
            <th  style="text-align:center;font-family: algeria;">Precio</th>
            <th  style="text-align:center;font-family: algeria;">Categoria</th>
            <th  style="text-align:center;font-family: algeria;">Provedor</th>
            @isset($reporte)
            @foreach($reporte as $rep)

            <tr>

                <td  style="text-align:center;font-family: algeria;">{{$rep->prod_nombre}}</td>
                <td  style="text-align:center;font-family: algeria;">{{$rep->prod_codigo}}</td>
                <td  style="text-align:center;font-family: algeria;">{{$rep->inv_cantidad}}</td>
                <td  style="text-align:center;font-family: algeria;">${{$rep->prod_precio}}</td>
                <td  style="text-align:center;font-family: algeria;">{{$rep->bod_nombre}}</td>
                <td  style="text-align:center;font-family: algeria;">{{$rep->prov_nombre}}</td>
            </tr>
            @endforeach
            @endisset
        </table>
    </div>
</div>


