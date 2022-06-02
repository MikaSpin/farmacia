@extends('layouts.app')
@section('content')
	<div class="container">
	 <div class="row justify-content-center">
	 	<div class="col-md-8">
	 		<div class="card" >

<div class="card-header bg-primary">

    <h4 class=" text-white" >Editar Productos </h4>
</div>
<div class="card-body">
    
    <form action="{{route('productos.update',$productos->prod_id)}}" method="POST" >  
     @csrf
    
             <div class="form-group row">
                                <label for="users" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                <input type="text"  class="form-control" value="{{$productos->prod_nombre}}" name="prod_nombre" id="prod_nombre" class="form-control @error('prod_nombre') is-invalid 
                                @enderror" name="prod_nombre" value="{{ old('prod_nombre') }}" required autocomplete="prod_nombre" autofocus>
                                    @error('users')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="prod_precio" class="col-md-4 col-form-label text-md-right">Precio</label>
                                <div class="col-md-6">
                                <input type="number" min="0" class="form-control" value="{{$productos->prod_precio}}" step="0.001" name="prod_precio" id="prod_precio" class="form-control @error('prod_precio') is-invalid 
                                @enderror" name="prod_precio" value="{{ old('prod_precio') }}" required autocomplete="prod_precio" autofocus>
                                    @error('prod_precio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prod_codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>
                                <div class="col-md-6">
                                <input type="number" min="0" class="form-control" value="{{$productos->prod_codigo}}" name="prod_codigo" id="prod_codigo" class="form-control @error('prod_codigo') is-invalid 
                                @enderror" name="prod_codigo" value="{{ old('prod_codigo') }}" required autocomplete="prod_codigo" autofocus>
                                    @error('prod_codigo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    <button class="btn btn-success" style="margin-left: 40%;">Guardar</button>
    
    </form>

</div>


</div>
</div>
</div>
</div>
 
@endsection