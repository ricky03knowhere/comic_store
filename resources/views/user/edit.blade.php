@extends('../layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-11 col-md-9">
      <div class="card p-3">
        <form method="POST" action="{{ url('user') }}">
          @csrf
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email')" name="email" value="{{ $user ->email }}" required autocomplete="email">
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name" value="{{ $user ->name }}" required autocomplete="name" autofocus>
            </div>
          </div>

         
          <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">Telephone</label>

            <div class="col-md-6">
              <input id="phone" type="number" class="form-control" name="phone" value="{{ $user ->phone }}">
            </div>
          </div>
        
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email')" name="email" value="{{ $user ->email }}" required autocomplete="email">
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>

            <div class="col-md-6">
              <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user ->phone }}" required>

              @error('phone')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          
          <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
            <div class="col-md-6">
              <textarea class="form-control @error('address') is-invalid @enderror" name="address" required id="address" rows="4">{{ $user ->address }}</textarea>

              @error('address')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>


          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                Save
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection