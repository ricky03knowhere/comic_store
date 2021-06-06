@extends('../layouts.app')

@section('content')
@include('layouts.headers.header')

<div class="container-fluid mt--6 mb-3">
  <div class="row justify-content-center" id="profile">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 col-md-8">
      <div class="card card-profile shadow mb-5">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2 mb--9">
            <div class="card-profile-image mt--5">
              <a href="#">
                <img src="{{ asset('assets/img/users').'/'.$user ->picture }}" alt="user_picture">
              </a>
            </div>
          </div>
        </div>
        <div class="card-body pt-0 pt-md-4 mt-4">
          <!-- <button href="#!" class="btn btn-sm badge-pill btn-primary d-flex mx-auto mt-6 mb-5">
            @if($user ->is_admin == 1)
            Administrator
            @else
            Customer
            @endif
          </button> -->

          <div class="text-center">
            <h3 class="text-capitalized">
              {{ $user ->name }}
            </h3>
            <div class="h5 font-weight-300">
              <i class="ni ni-email-83 mr-2"></i>
              {{ $user ->email }}
            </div>
            <div class="h5 mt-4">
              <i class="fa fa-phone-alt mr-2"></i>{{ $user ->phone }}
            </div>
            <div>
              <i class="ni ni-pin-3 mr-2"></i>{{ $user ->address }}
            </div>
          </div>
          <button onclick="window.history.back()" class="btn btn-default badge-pill float-right mt-5 mb-3">
            <i class="fas fa-edit mr-1"></i>Back
          </button>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footers.auth')
</div>