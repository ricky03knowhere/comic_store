@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
@include('layouts.headers.guest')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-header bg-transparent py-4">
          <h1 class="text-center text-dark">Login Page</h1>
        </div>
        <div class="card-body px-lg-5 py-lg-5">
          @if(session('error'))

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-icon mb-1">
              <i class="fa fa-exclamation-triangle"></i>
              <b style="font-size: 1rem">Warning !</b>
            </span>
            <span class="alert-text">
              {{ session('error') }}
            </span>
          </div>

            @endif
            <form role="form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group{{ $errors->
            has('email') ? ' has-danger' : '' }} mb-3">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
              </div>
              <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@argon.com" required autofocus>
            </div>

          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
              </div>
              <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="secret" required>
            </div>

          </div>
          <div class="custom-control custom-control-alternative custom-checkbox">
            <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customCheckLogin">
              <span class="text-muted">{{ __('Remember me') }}</span>
            </label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary my-4">Login</button>
          </div>
        </form>
      </div>
      <div class="row mt-3 p-4 text-center ">
        <div class="col-md-6 mb-3">
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="font-weight-bold">
            <small>{{ __('Forgot password?') }}</small>
          </a>
          @endif
        </div>
        <div class="col-md-6">
          <a href="{{ route('register') }}" class="font-weight-bold">
            <small>{{ __('Create new account') }}</small>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection