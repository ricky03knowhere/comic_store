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
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm" id="user-img">
              <img alt="Image placeholder" src="{{ asset('assets/img/users').'/'.Auth::user() ->picture }}">
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h5 class="text-overflow m-0 text-capitalize">
              <span class="d-block d-sm-none"> {{ Auth::user() ->name }} </span>
              <span class="badge badge-pill badge-primary ml-2">Administrator</span>
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
          <a href="{{ route('logout') }}" class="dropdown-item btn-logout warn-notif" data-msg="leave this page..."
            data-form="logout-form">
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
          <a class="nav-link" href="{{ url('admin/home') }}">
            <i class="ni ni-tv-2 text-yellow"></i> {{ __('Dashboard') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('store/') }}">
            <i class="ni ni-shop" style="color: #e861ff"></i>Store
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('transactions/list') }}">
            <i class="fa fa-hand-holding-usd text-green"></i>Transactions
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('comics/list') }}">
            <i class="ni ni-book-bookmark text-info"></i>Comics Collection
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('users/list') }}">
            <i class="fa fa-users text-orange"></i>Users List
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>