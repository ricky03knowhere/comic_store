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

        <div class="card-body py-5 px-3">
          <div class="row">
            <div class="col-md-5 mb-2">
              <img src="{{ asset('assets/img/books').'/'.$book ->picture }}" alt="404" class="img-thumbnail rounded">
            </div>

            <div class="col-md-7">
              <h3>{{ $book -> title }} </h3>

              <table>
                <tr class="text-muted">
                  <td><i class="ni ni-single-02 mr-2"></i></td>
                  <td class="align-top">Author</td>
                  <td><span class="px-3">:</span> {{ $book -> author }}</td>
                </tr>
                <tr class="text-orange h4" style="height: 2.5em;">
                  <td><i class="ni ni-books mr-2"></i></td>
                  <td>Stock</td>
                  <td><span class="px-3">:</span> {{ $book -> stock }} pcs</td>
                </tr>
                <tr class="text-green h4">
                  <td><i class="fas fa-dollar-sign  mr-2"></i></td>
                  <td>Price</td>
                  <td><span class="px-3">:</span>Rp. {{ number_format($book -> price) }},-</td>
                </tr>
              </table>
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