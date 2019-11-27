<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('titulo')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @section('css')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ URL::asset('plantilla/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ URL::asset('plantilla/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ URL::asset('plantilla/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ URL::asset('plantilla/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('plantilla/css/themes/all-themes.css') }}" rel="stylesheet" />

    @show

    @yield('extra-css')


    
</head>

<body class="theme-red">
    {{--Load Pagina--}}
    @include('layouts.partials.loader') 
    {{-- FIN Load Pagina--}}

    {{--Overlay For Sidebars--}}
    <div class="overlay"></div>
    {{-- FIN Overlay For Sidebars--}}

    {{-- Search Bar --}}
    @include('layouts.partials.search')
    {{-- FIN Search Bar --}}

    {{-- Top Bar --}}
    @include('layouts.partials.top-navbar')
    {{-- FIN Top Bar --}}


    <section>
        {{-- LEFT Sidebar--}}
        @include('layouts.partials.left-sidebar')
        {{-- FIN LEFT Sidebar--}}

        {{-- RIGHT Sidebar--}}
        @include('layouts.partials.right-sidebar')
        {{-- FIN RIGHT Sidebar--}}
    </section>

    <section class="content">
        @yield('content')
    </section>

    @section('scripts')
    
    <!-- Jquery Core Js -->
    <script src="{{ URL::asset('plantilla/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ URL::asset('plantilla/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ URL::asset('plantilla/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ URL::asset('plantilla/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ URL::asset('plantilla/plugins/node-waves/waves.js') }}"></script>
    @show

    @yield('extra-scripts')


    @section('bottom-scripts')    
    
    <!-- Custom Js -->
    <script src="{{ URL::asset('plantilla/js/admin.js') }}"></script>
    
    <!-- Demo Js -->
    <script src="{{ URL::asset('plantilla/js/demo.js') }}"></script>
    @show

</body>

</html>
