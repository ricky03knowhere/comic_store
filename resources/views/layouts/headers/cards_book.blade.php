@php
use App\Models\Book;

$books = Book::all();

@endphp
<div class="header bg-gradient-primary pb-8 pt-4 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="home-demo">

        <div class="row mb-8">
          <div class="col-12 col-xs-11">
            <div class="owl-carousel owl-theme">
              @foreach($books as $book) <div class="item">
                <img src="{{ asset('assets') }}/img/books/{{ $book -> picture }}" width="8em"
                  style="border-radius: 8px">
              </div>
              @endforeach

            </div>
          </div>
        </div>


      </div>

      <a class="h4 text-white text-uppercase" href="{{ route('home') }}">
        <i class="ni ni-shop mr-2 mt--2"></i>
        Store
      </a>

    </div>
  </div>
</div>