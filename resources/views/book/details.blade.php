@extends('../layouts.app')

@section('content')
@include('layouts.headers.header')

@if(session('notif'))
<div id="notif" data-notif="{{ session('notif') }}"></div>
@endif

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-11">
      <div class="card table-card bg-secondary shadow mb-6">

        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="ni ni-book-bookmark mx-2"></i>Books Collection /
            <i class="ni ni-collection mx-2"></i> {{ $book -> title }} /
            <i class="fas fa-info-circle mx-2"></i> Details
          </h2>
        </div>

        <div class="card-body p-5">
          <div class="row">
            <div class="col-md-5 mb-2">
              <img src="{{ asset('assets/img/books').'/'.$book ->picture }}" alt="404" class="img-thumbnail rounded">
            </div>

            <div class="col-md-7">
              <h3>{{ $book -> title }} </h3>
              <span class="text-muted"><i class="ni ni-single-02 mr-1"></i>Author &#8;&#8;: {{ $book -> author }} </span>
              <h4 class="text-orange my-3"><i class="ni ni-books mr-1"></i>Stock &#8;&#8;: {{ $book -> stock }} pcs</h4>
              <h4 class="text-green"><i class="fas fa-dollar-sign mr-1"></i>Price : Rp {{ $book -> price }},-</h4>
            </div>
            
          </div>
          <p class="my-4 text-justify mx-3">
            <b><i class="ni ni-single-copy-04 mr-1"></i>Sinopsis :</b><br>
            {{ $book -> desc }}
          </p>

        </div>


        <div class="text-center">
          <a href="{{ url('book/edit', $book ->id) }}" class="btn btn-primary my-4"><i class="fas fa-edit mr-2"></i>Edit</a>
          <button onclick="window.history.back()" class="btn btn-white ml-auto">Back</button>
        </div>
      </div>



    </div>
  </div>

@include('layouts.footers.auth')
</div>

@endsection