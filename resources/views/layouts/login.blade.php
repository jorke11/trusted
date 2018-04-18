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

        <!-- Bootstrap -->
        <!--<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
        {!!Html::style('/vendor/template/vendors/bootstrap/dist/css/bootstrap.min.css')!!}
        {!!Html::script('/vendor/template/vendors/bootstrap/dist/js/bootstrap.min.js')!!}
        {!!Html::style('/vendor/template/vendors/font-awesome/css/font-awesome.min.css')!!}
        {!!Html::style('/vendor/template/vendors/nprogress/nprogress.css')!!}

        <!-- Font Awesome -->

        <!--<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->
        <!-- NProgress -->
        <!--<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">-->
        <!-- bootstrap-wysiwyg -->
        <!--<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">-->

        <!-- Custom styling plus plugins -->
        <!--<link href="../build/css/custom.min.css" rel="stylesheet">-->


        {!!Html::style('/vendor/font-awesome-4.7.0/css/font-awesome.min.css')!!}


    </head>

    <style>
        /*        .navbar-default {
                    background-color: #212121;
                    border-color: #E7E7E7;
                }*/

        #app{
            align-items: center;
            display: flex;
            justify-content: center;
            margin: 10% auto;
        }

        .navbar-custom {
            background-color:#212121;
            color:#ffffff;
            border-radius:0;
        }

        .navbar-custom .navbar-nav > li > a {
            color:#fff;
        }

        .navbar-custom .navbar-nav > .active > a {
            color: #ffffff;
            background-color:transparent;
        }

        .navbar-custom .navbar-nav > li > a:hover,
        .navbar-custom .navbar-nav > li > a:focus,
        .navbar-custom .navbar-nav > .active > a:hover,
        .navbar-custom .navbar-nav > .active > a:focus,
        .navbar-custom .navbar-nav > .open >a {
            text-decoration: none;
            background-color: white;

        }

        .navbar-custom .navbar-brand {
            color:#eeeeee;
        }
        .navbar-custom .navbar-toggle {
            background-color:#eeeeee;
        }
        .navbar-custom .icon-bar {
            background-color:#33aa33;
        }

    </style>

    <body style='background-image:url("images/fondoespacial.jpg");    height: 100%; 
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;'>
        <div id="app">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        <!--<script src="{{ asset('js/app.js') }}"></script>-->
    </body>
</html>
