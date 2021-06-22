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

  <div class="main-content mt--3 bg-default">
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5 bg-default">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <h2>{{ __('Verify Your Email Address') }}</h2>
              </div>
              <div>
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                  {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}

                @if (Route::has('verification.resend'))
                {{ __('If you did not receive the email') }}, <a
                  href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footers.guest')
  </div>



  <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  @stack('js')

  <!-- Argon JS -->
  <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

</body>

</html>