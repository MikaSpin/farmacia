@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Bienvenido ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


        <div style="text-align: center;"><img  src="https://media.istockphoto.com/vectors/blue-and-green-medical-cross-health-vector-id1275720974?k=20&m=1275720974&s=612x612&w=0&h=UTYONlQmk-ku34pq9m0sn-GzxPJVW7NdFQsJibSub9s=" width="50%" height="50%"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
