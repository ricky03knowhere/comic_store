@extends('../layouts.app')
@section('content')

@include('layouts.headers.cards_book')

<div class="container-fluid mt--6">
  <div class="row" id="book-shelf">
    @foreach($books as $book)

    <div class="col-6 col-md-4 col-lg-3">

      <div class="card mb-5 card-lift--hover">
        <img src="{{ asset('assets').'/img/books/'.$book ->picture }}" class="card-img" alt="...">
        <div class="card-img-overlay">
          <p class="card-text">
          <h4 class="text-gren text-right price">Rp. {{ number_format($book ->price) }},-</h4>
          </p>
          <h4 class="text-white title">{{ $book ->title }}</h4>
          <h4 class="author">{{ $book ->author }}</h4>
          <a href=" {{ url('order', $book ->id) }} " class="btn btn-primary float-right">
            <i class="fas fa-shopping-cart mr-1"></i> Order
          </a>
        </div>
      </div>


    </div>
    @endforeach
  </div>

  @include('layouts.footers.auth')

</div>

@endsection