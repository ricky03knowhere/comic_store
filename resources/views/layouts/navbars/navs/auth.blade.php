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
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark sticky-top shadow" id="navbar-main">
  <div class="container-fluid">
    <!-- Brand -->
    <a class="h4 mb-0 text-white text-uppercase ml--3" href="{{ route('home') }}">
    </a>
    <!-- Form -->
    <!-- User -->
    <ul class="navbar-nav align-items-center d-none d-md-flex text-right" id="topbar">
      @if(Auth::user() ->is_admin != 1)
      <li class="nav-item dropdown cart-notif">
        <a class="nav-link nav-link-icon" href="{{ url('checkout') }}" role="button" aria-haspopup="true"
          aria-expanded="false">
          <i class="ni ni-cart"></i>

          @if(($cart != null) && ($cart != 0))
          <span class="badge badge-circle badge-sm bg-success text-default mt--5 notif font-weight-900">
            {{ $cart }}
          </span>
          @endif


        </a>
      </li>
      @endif
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle user-img">
              <img alt="Image placeholder" src="{{ asset('assets/img/users').'/'.Auth::user() ->picture }}">
            </span>
            <div class="media-body d-none d-md-block mr--2 pl-3">
              <span class="mb-0 text-sm font-weight-bold text-capitalize tag-name">{{ Auth::user() ->name }}</span>
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h5 class="text-overflow m-0 text-capitalize">
              <span class="d-block d-sm-none"> {{ Auth::user() ->name }} </span>

              @if(Auth::user() ->is_admin == 1)
              <span class="badge badge-pill badge-primary ml-2">Administrator</span>
              @else
              <span class="badge badge-pill badge-success ml-2">Customer</span>
              @endif
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

          <a href="#!" class="dropdown-item btn-logout warn-notif" data-msg="leave this page..."
            data-form="logout-form">
            <i class="ni ni-user-run"></i>
            <span>{{ __('Logout') }}</span>
          </a>
          <form action="{{ route('logout') }}" id="logout-form" method="post">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>