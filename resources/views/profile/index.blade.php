@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('profile.partials.header', [
'title' => __('Hello,') . ' '. auth()->user()->name,
'class' => 'col-lg-7'
])

@if(session('notif'))
<div id="notif" data-notif="{{ session('notif') }}"></div>
@endif


<div class="container-fluid mt--6 mb-3">
  <div class="row justify-content-center" id="profile">
    <div class="col-11 col-xl-5  mb-5 mb-xl-0 col-md-8">
      <div class="card card-profile shadow mb-5">
        <div class="row justify-content-center">
          <div class="card-profile-image mt--5">
            <a href="#">
              <img src="{{ asset('assets/img/users').'/'.auth() ->user() ->picture }}" alt="user_picture">
            </a>
          </div>
        </div>
        <div class="card-body pt-0 pt-md-4 mt-4">
          <button href="#!" class="btn btn-sm badge-pill btn-primary d-flex mx-auto mt-lg--4 mb-5">
            @if(auth()->user()->is_admin == 1)
            Administrator
            @else
            Customer
            @endif
          </button>

          <h1 class="text-capitalize font-weight-800 mb-4">
            {{ auth()->user()->name }}
          </h1>
          <div class="h4 font-weight-300">
            <i class="ni ni-email-83 mr-3"></i>{{ auth()->user()->email }}
          </div>
          <div class="h4 mt-4">
            <i class="fa fa-phone-alt mr-3"></i>{{ auth()->user()->phone }}
          </div>
          <div class="h4 font-weight-400 mt-4">
            <i class="ni ni-pin-3 mr-3"></i>{{ auth()->user()->address }}
          </div>

          <a href="{{ url('profile/edit') }}" class="btn btn-sm btn-default badge-pill float-right mt-5 mb-3">
            <i class="fas fa-edit mr-1"></i>Edit Profile</a>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footers.auth')
</div>
@endsection