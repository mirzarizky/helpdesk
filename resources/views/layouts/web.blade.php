<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{setting('site.title')}}</title>
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="keywords" content="{{setting('site.keywords')}}">
    <meta name="author" content="Klola Dev">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- Material Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    <link href="{{ asset('css/bootstrap-material-design.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('css/emoji.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" />

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- Script -->
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="69233dc5-8fc0-4f69-91de-e63f1a75333d";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</head>
<body class="home_alt">
    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{ asset('img/loader-alt.gif') }}" alt="">
    </div><!-- end loader -->

    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    @yield('js')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/tooltip.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
