<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts --> 
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="border-bottom: solid 1px blue;">
            <div class="container">
                
                @guest
                
                <img src="https://w7.pngwing.com/pngs/748/441/png-transparent-logo-pharmacy-pills-miscellaneous-trademark-pharmaceutical-drug.png" width="85" height="45" class="d-inline-block align-top"  alt="">
                @else
                
                
                <div class="row">
                    <div class="col-md-1">
    <img src="https://w7.pngwing.com/pngs/748/441/png-transparent-logo-pharmacy-pills-miscellaneous-trademark-pharmaceutical-drug.png" width="80" height="40" class="d-inline-block align-top"   alt="">

</div>
<div class="col-md-11" style="text-align:center;">



    <a   class="nav-item botones"    style="text-decoration: none;" href="{{route('usuarios')}}">Usuarios 
    &nbsp
       
    </a>



    <a class="nav-item botones"   style="text-decoration: none;" href="{{route('productos')}}">Productos
    &nbsp
       
    </a>




    <a class="nav-item botones"   style="text-decoration: none;" href="{{route('inventario')}}">Inventario
    &nbsp
        
    </a>




    <a class="nav-item botones"   style="text-decoration: none;" href="{{route('bodegas')}}">Bodegas
    &nbsp
        
    </a>





    <a class="nav-item botones"   style="text-decoration: none;" href="{{route('provedor')}}">Provedor
    &nbsp
       
    </a>                     
    <a class="nav-item botones"   style="text-decoration: none;" href="{{route('facturas.index')}}">Factura
    &nbsp
   
    </a>                     
    <a class="nav-item botones"   style="text-decoration: none;" href="{{route('reporte')}}">Reporte
    &nbsp
   
    </a>                     




    <!-- <a class="nav-item botones"   style="text-decoration: none;" href="">Ventas
        
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
        </svg>
    </a>                       



    <a class="nav-item botones"   style="text-decoration: none;" href="">Clientes 
        
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg>
    </a> -->
    </div>
    </div>

                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:black;" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <!-- <li class="nav-item">
                                    <a class="nav-link" style="color:black;" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li> -->
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                    {{ Auth::user()->users }}
                                </a>




                        <ul class="dropdown-menu">
                    <!-- The user image in the menu -->



                            <li class="user-header">
                                <center>
   
                                </center>
                                <p>
                                    <center>
                                    <small><h4>Bienvenido</h4></small>
                                    </center>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <center>
                                    <a href="http://localhost/farmacia/public/home">Home</a>
                                    </center>
                                </div>

                                <div class="pull-right">
                                    <center>
                                    <a href="http://localhost/farmacia/public/logout" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item">
                                        Salir
                                     </center>   
                                    </a>


                                </div>
                            </li>
                        </ul>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
