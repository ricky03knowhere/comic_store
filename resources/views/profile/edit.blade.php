@extends('layouts.app', ['title' => __('User Edit Profile')])

@section('content')
@include('profile.partials.header', [
'title' => __('Hello, ') . ' '. auth()->user()->name,
'class' => 'col-lg-7'
])

@if(session('alert-notif'))
<div id="alert-notif" data-notif="{{ session('alert-notif') }}"></div>
@endif

{!!$errors ->first('picture', '<div id="alert-notif" data-notif=":message"></div>')!!}


<div class="container-fluid mt--7">
  <div class="row justify-content-center">
    <div class="col-md-9 col-xl-8">
      <div class="card bg-secondary shadow mb-6">
        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="ni ni-settings-gear-65 mr-2"></i>Edit Profile
          </h2>
        </div>
        <div class="card-body p-5">
          <form method="post" action="{{ url('profile/update') }}" enctype="multipart/form-data">
            @csrf <div class="pl-lg-4">
              <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-email">{{ __('Email') }}</label> <input type="email"
                  name="email" id="input-email"
                  class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
              <div class="row">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6">
                  <label class="form-control-label" for="input-name">{{ __('Name') }}</label> <input type="text"
                    name="name" id="input-name"
                    class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                  @if ($errors->has('name')) <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong> </span> @endif
                </div>
                <div class="form-group col-md-6">
                  <label class="form-control-label" for="phone">Telephone</label> <input id="phone" type="number"
                    class="form-control form-control-alternative" name="phone" value="{{ $user ->phone }}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="address">Address</label>
                <textarea id="address" class="form-control form-control-alternative" name="address" rows="3"
                  required>{{ $user ->address }}</textarea>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <img src="{{ asset('assets') }}/img/users/{{ $user ->picture }}" alt="user_pict"
                    class="img-thumbnail rounded picture-preview" width="150px">
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <lable class="form-control-label">Picture</lable>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="pictureSelector" lang="en" name="picture"
                        onchange="picture_preview()">
                      <label class="custom-file-label  picture-label" for="customFileLang">Select
                        picture</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
          <hr class="my-4" />
          <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
            @csrf
            @method('put')
            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6> @if (session('password_status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('password_status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button>
            </div>
            @endif
            <div class="pl-lg-4">
              <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                <input type="password" name="old_password" id="input-current-password"
                  class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('Current Password') }}" value="" required> @if ($errors->has('old_password')) <span
                  class="invalid-feedback" role="alert"> <strong>{{ $errors->first('old_password') }}</strong> </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                <input type="password" name="password" id="input-password"
                  class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('New Password') }}" value="" required> @if ($errors->has('password')) <span
                  class="invalid-feedback" role="alert"> <strong>{{ $errors->first('password') }}</strong> </span>
                @endif
              </div>
              <div class="form-group">
                <label class="form-control-label"
                  for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                <input type="password" name="password_confirmation" id="input-password-confirmation"
                  class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value=""
                  required>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-default mt-4">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footers.auth')
</div>
@endsection