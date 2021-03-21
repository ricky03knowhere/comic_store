@extends('../layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-11 col-md-6">
      <a href="{{ url('user',[$user -> id],) }}/edit" class="btn btn-info">Edit Profile</a>
      <div class="card">
        <div class="card-header">
            <h3>{{ $user ->name }}</h3>
       <span class="text-muted">
          Email   : {{ $user ->email}}
       </span>
        </div>

        <div class="card-body">
          Phone   : {{ $user ->phone}} <br>
          Address : {{ $user ->address }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection