<!DOCTYPE html>
<html lang="es">
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- JQUERY -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-ui.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.css') }}">
    
    <!-- BOOTSTRAP -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

    <!-- DATA TABLES -->
    <link rel="stylesheet" href="{{ URL::asset('assets/dataTables/css/jquery.dataTables.css') }}">
    <script type="text/javascript" src="{{ URL::asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <!-- FUENTES -->
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/fonts-google.css') }}">
    <!-- PROPIOS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css') }}">
    <script type="text/javascript" src="{{ URL::asset('assets/js/laravel.js') }}"></script>
    <!-- CIFRADO SHA-256 -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/sha256.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/dropdown.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/funciones.js') }}"></script>


</head>
<body id="app-layout">

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Gesti&oacute;n
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Inicio</a></li>
                    <li><a href="{{ url('/articulos') }}">Articulos</a></li>
                    <li><a href="{{ url('/proveedores') }}">Proveedores</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Acceder</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>
</html>
