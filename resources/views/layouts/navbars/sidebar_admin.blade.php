<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-default sticky-top" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" ></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="{{ route('home') }}">
      <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none" id="user-nav">
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle" id="user-img">
              <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0 text-capitalize">{{ Auth::user() ->name }}
             <span class="badge badge-pill badge-primary ml-2">Administrator</span>
            </h6>
          </div>
          <a href="{{ url('profile/details') }}" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>{{ __('My profile') }}</span>
          </a>
          <a href="{{ route('profile.edit') }}" class="dropdown-item">
            <i class="ni ni-settings-gear-65"></i>
            <span>Edit Profile</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item" id="btn-logout">
            <i class="ni ni-user-run"></i>
            <span>{{ __('Logout') }}</span>
          </a>
        </div>
      </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="{{ url('admin/home') }}">
              <img src="{{ asset('argon') }}/img/brand/blue.png">
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
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
            <i class="ni ni-tv-2 text-danger"></i> {{ __('Dashboard') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile.edit') }}">
            <i class="fa fa-hand-holding-usd text-green"></i>Transactions
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('book/list') }}">
            <i class="ni ni-book-bookmark text-info"></i>Books Collection
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fa fa-users text-yellow"></i>Users List
          </a>
        </li>
     </ul>
      </div>
    </div>
  </nav>