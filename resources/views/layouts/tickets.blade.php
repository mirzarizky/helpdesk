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
      <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" />
      <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
      <link href="{{ asset('css/settings.css') }}" rel="stylesheet">
      <link href="{{ asset('css/emoji.css') }}" rel="stylesheet">
      <link href="{{ asset('vendor/jQuery-File-Upload/css/jquery.fileupload.css') }}" rel="stylesheet">
      @yield('css')
      <!-- Script -->
      <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="69233dc5-8fc0-4f69-91de-e63f1a75333d";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
      <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  </head>
  <body class="home_alt">
      <!-- LOADER -->
      <div id="preloader">
          <img class="preloader" src="{{ asset('img/loader-alt.gif') }}" alt="">
      </div><!-- end loader -->

      @include('partials.header')
      @yield('auth_content')
      <section class="section lb pt-30">
          <div class="container">
            @yield('content')
          </div>
      </section>
      <!-- Scripts -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('js/material.min.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/tmpl.min.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/load-image.all.min.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/canvas-to-blob.min.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/jquery.fileupload.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/jquery.iframe-transport.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/jquery.fileupload-process.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/jquery.fileupload-image.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/jquery.fileupload-video.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/jquery.fileupload-audio.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/jquery.fileupload-validate.js') }}"></script>
      <script src="{{ asset('vendor/jQuery-File-Upload/js/jquery.fileupload-ui.js') }}"></script>

      @yield('footer')
  </body>
</html>
