<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
    Comic Store
  </title>
  <!-- Favicon -->
  <link href="{{ asset('argon') }}/img/brand/brand.webp" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Extra details for Live View on GitHub Pages -->

  <!-- Icons -->
  <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

  <!--Owl Carousel CSS-->
  <link href="{{ asset('assets') }}/css/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/css/owl.theme.default.min.css" rel="stylesheet">

  <!--Custom CSS-->
  <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">


  <!--Jquery JS-->
  <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>

  <!--Owl Carousel JS-->
  <script src="{{ asset('assets')}}/js/owl.carousel.min.js"></script>


  <!-- Bootstrap Toggle CSS -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet" />

</head>

<body class="{{ $class ?? '' }}">
  @auth()
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  @if(Auth::user() ->is_admin == 1)
  @include('layouts.navbars.sidebar_admin')
  @else
  @include('layouts.navbars.sidebar')
  @endif

  @endauth

  <div class="main-content mt--3">
    @include('layouts.navbars.navbar')
    @yield('content')
  </div>
  @guest()
  @include('layouts.footers.guest')
  @endguest

  <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  @stack('js')

  <!-- Argon JS -->
  <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

  <!-- DataTables JS -->
  <script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <!--SweetAlert JS-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Bootstrap Toggle JS -->
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

  <!--Custom JS-->
  <script src="{{ asset('assets')}}/js/script.js"></script>
  <script src="{{ asset('assets')}}/js/confirm.js"></script>


  <!-- @if (getenv('APP_ENV') === 'local')
  <script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3004/browser-sync/browser-sync-client.js?v=2.26.14'><\/script>".replace("HOST", location.hostname));
//]]></script>
  @endif -->
</body>

</html>