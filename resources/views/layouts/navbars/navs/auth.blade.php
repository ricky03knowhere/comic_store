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
        <a class="nav-link nav-link-icon" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="ni ni-cart"></i>
          <span class="badge badge-circle badge-sm bg-success text-default mt--5 notif">48</span>
        </a>
      </li>
      @endif
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
              <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
            </span>
            <div class="media-body d-none d-md-block mr--2 pl-3">
              <span class="mb-0 text-sm font-weight-bold text-capitalize tag-name">{{ Auth::user() ->name }}</span>
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0 text-capitalize">{{ Auth::user() ->name }}
              @if(Auth::user() ->is_admin == 1)
              <span class="badge badge-pill badge-primary ml-2">Administrator</span>
              @else
              <span class="badge badge-pill badge-success ml-2">Customer</span>
              @endif
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
  </div>
</nav>