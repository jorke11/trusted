<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Trusted') }}</title>

        <!-- Styles -->
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

        <script>var PATH = '{{url("/")}}'</script>
        {!!Html::script('/vendor/template/vendors/jquery/dist/jquery.min.js')!!}
        {!!Html::script('/vendor/jquery-ui.js')!!}

        {!!Html::script('/vendor/DataTables-1.10.13/media/js/jquery.dataTables.min.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/extensions/ColReorder/js/dataTables.colReorder.min.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/extensions/Buttons/js/dataTables.buttons.min.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/jszip.min.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/pdfmake.min.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/vfs_fonts.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/buttons.html5.min.js')!!}

        {!!Html::style('/vendor/DataTables-1.10.13/media/css/jquery.dataTables.css')!!}	

        {!!Html::style('/vendor/DataTables-1.10.13/extensions/Buttons/css/buttons.bootstrap.css')!!}



        {!!Html::style('/vendor/DataTables-1.10.13/extensions/Buttons/css/buttons.dataTables.min.css')!!}

        {!!Html::script('/vendor/DataTables-1.10.13/extensions/Buttons/js/buttons.html5.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/extensions/Buttons/js/buttons.colVis.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/extensions/Buttons/js/buttons.flash.js')!!}
        {!!Html::script('/vendor/DataTables-1.10.13/extensions/Buttons/js/buttons.print.js')!!}



        <!--<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>-->
        <!--<link href='//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css' rel="stylesheet" />-->

        {!!Html::script('/vendor/toastr/toastr.min.js')!!}
        {!!Html::style('/vendor/toastr/toastr.min.css')!!}
        <!--{!!Html::style('/vendor/DataTables-1.10.13/media/css/dataTables.bootstrap.css')!!}--> 
        <!--{!!Html::style('/vendor/DataTables-1.10.13/media/css/jquery.dataTables.css')!!}--> 

        <!-- Bootstrap -->
        <!--<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
        {!!Html::style('/vendor/template/vendors/bootstrap/dist/css/bootstrap.min.css')!!}
        {!!Html::script('/vendor/template/vendors/bootstrap/dist/js/bootstrap.min.js')!!}
        {!!Html::style('/vendor/template/vendors/font-awesome/css/font-awesome.min.css')!!}
        {!!Html::style('/vendor/template/vendors/nprogress/nprogress.css')!!}
        {!!Html::style('/vendor/template/vendors/google-code-prettify/bin/prettify.min.css')!!}

        <!-- Font Awesome -->

        <!--<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->
        <!-- NProgress -->
        <!--<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">-->
        <!-- bootstrap-wysiwyg -->
        <!--<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">-->

        <!-- Custom styling plus plugins -->
        <!--<link href="../build/css/custom.min.css" rel="stylesheet">-->

        {!!Html::style('/vendor/datetimepicker/css/jquery.datetimepicker.css')!!}
        {!!Html::script('/vendor/datetimepicker/js/jquery.datetimepicker.full.min.js')!!}


        {!!Html::style('/vendor/font-awesome-4.7.0/css/font-awesome.min.css')!!}

        <!--{!!Html::style('/vendor/template/build/css/custom.min.css')!!}-->
        {!!Html::style('/vendor/select2/css/select2.min.css')!!}
        {!!Html::script('/vendor/select2/js/select2.js')!!}
        {!!Html::script('/vendor/plugins.js')!!}
        {!!Html::style('/css/edited.css')!!}


    </head>
    <body>
        <div id="app">
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
                            {{ config('app.name', 'Trusted') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{url("/")}}">Inicio</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operacion <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/accessPerson">Ingreso Personas</a></li>
                                    <li><a href="/ticket">Tickets</a></li>
                                    <li><a href="#">Crm</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parametrizacion <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/parameter">Parametros</a></li>
                                    <li><a href="/city">Ciudades</a></li>
                                    <li><a href="/department">Departamentos</a></li>
                                    <li><a href="/clients">Clientes</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Seguridad <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/user">Usuarios</a></li>
                                    <li><a href="#">Permisos</a></li>
                                    <li><a href="#">Roles</a></li>
                                    <li><a href="#">Menu</a></li>
                                </ul>
                            </li>

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        <!--<script src="{{ asset('js/app.js') }}"></script>-->
    </body>
</html>
