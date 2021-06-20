@php
use App\Models\Order;
use App\Models\Detail_order;

$cart = 0;

$order = Order::where('user_id', auth() ->user() ->id)
->where('status', '==', 0) ->first();

if($order != null){
$cart = Detail_order::where('order_id', $order ->id) ->sum('quantity');

}

@endphp

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-default sticky-top" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
      aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-md-4" href="{{ url('/') }}">
      <img src="{{ asset('argon') }}/img/brand/brand.webp"
        class="navbar-brand-img mb-4 d-none d-lg-block d-xl-block d-md-block m-auto" alt="..."
        style="transform: scale(1.7)">
      <h2 class="text-primary font-weight-900 mt-md-4">Comic Store</h2>

    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none" id="user-nav">
      <li class="nav-item">
        <a class="nav-link nav-link-icon" href="{{ url('checkout') }}">
          <i class="ni ni-cart"></i>

          @if(($cart != null) && ($cart != 0))
          <span class="badge badge-circle badge-sm bg-success text-default font-weight-900"
            style="transform: scale(.75) translate(-30%, -80%); font-size: 1em">
            {{ $cart }}
          </span>
          @endif

        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle" id="user-img">
              <img alt="Image placeholder" src="{{ asset('assets/img/users').'/'.Auth::user() ->picture }}">
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h5 class="text-overflow m-0 text-capitalize">
              <span class="d-block d-sm-none"> {{ Auth::user() ->name }} </span>
              <span class="badge badge-pill badge-primary ml-2">Customer</span>
            </h5>
          </div>
          <a href="{{ url('profile/details') }}" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>{{ __('My profile') }}</span>
          </a>
          <a href="{{ url('profile/edit') }}" class="dropdown-item">
            <i class="ni ni-settings-gear-65"></i>
            <span>Edit Profile</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="ni ni-user-run"></i>
            <span>{{ __('Logout') }}</span>
          </a>
        </div>
      </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse mt-md--4" id="sidenav-collapse-main">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a class="navbar-brand pt-md-4 d-flex" href="{{ url('/') }}">
              <img src="{{ asset('argon') }}/img/brand/brand.webp" class="navbar-brand-img mr-3" alt="..."
                style="transform: scale(1.3)">
              <h2 class="text-primary font-weight-900 mt-md-4">Comic Store</h2>

            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main"
              aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <!-- Form -->
      <!-- Navigation -->
      <ul class="navbar-nav" id="sidebar-desk">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('home') }}">
            <i class="ni ni-tv-2 text-info"></i> {{ __('Dashboard') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('store/') }}">
            <i class="ni ni-shop" style="color: #e861ff"></i>Store
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('checkout') }}">
            <i class="ni ni-cart text-green"></i>My Cart
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('history') }}">
            <i class="fas fa-history text-yellow"></i>Orders History
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>