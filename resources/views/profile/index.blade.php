@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
'title' => __('Hello,') . ' '. auth()->user()->name,
'class' => 'col-lg-7'
])

<div class="container-fluid mt--6 mb-3">
  <div class="row justify-content-center">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 col-md-8">
      <div class="card card-profile shadow mb-5">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2 mb-5">
            <div class="card-profile-image">
              <a href="#">
                <img src="{{ asset('assets/img/users').'/'.auth() ->user() ->picture }}" class="rounded-circle" alt="user_picture">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        </div>
        <div class="card-body pt-0 pt-md-4 mt-4">
          <button href="#!" class="btn btn-sm badge-pill btn-primary d-flex mx-auto mt-2 mb-5">
            @if(auth()->user()->is_admin == 1)
            Administrator
            @else
            Customer
            @endif
          </button>

          <div class="text-center">
            <h3>
              {{ auth()->user()->name }}
            </h3>
            <div class="h5 font-weight-300">
              <i class="ni ni-email-83 mr-2"></i>
              {{ auth()->user()->email }}
            </div>
            <div class="h5 mt-4">
              <i class="fa fa-phone-alt mr-2"></i>{{ auth()->user()->phone }}
            </div>
            <div>
              <i class="ni ni-pin-3 mr-2"></i>{{ auth()->user()->address }}
            </div>
          </div>
          <a href="{{ url('profile/edit',Auth::user() ->id) }}" class="btn btn-default badge-pill float-right mt-5 mb-3">
            <i class="fas fa-edit mr-1"></i>Edit Profile</a>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footers.auth')
</div>
@endsection