@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
@isset($msg)
     <div class="bg-danger"><strong>{{$msg}}</strong></div>
     @endisset      

            <div class="card" >
                <div class="card-header bg-primary">
                <div class="row">
<div class="col-md-10">

    <h2 class="text-white " style="">Lista de Usuarios</h2>
</div>
<div class="col-md-2">

    <a href="{{route('usuarios.create')}}" class="btn btn-success">Nuevo</a>
</div>
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped ">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Cedula</th>
                        <th>acciones</th>
                        @foreach($users as $u)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$u->users}}</td>
                            <td>{{$u->use_apellido}}</td>
                            <td>{{$u->use_telefono}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->use_cedula}}</td>

                            <td>
                                <div class="row">

                                    <a href="{{route('usuarios.edit',$u->use_id)}}" style="background:#46b6d0;" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <form action="{{route('usuarios.destroy',$u->use_id)}}" method="POST" onsubmit="return confirm('Desea eliminar?')">
                                        @csrf
                                        <button class="btn text-white " style="background:#eb0009;">
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